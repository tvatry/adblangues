<?php

namespace App\Controller;

use App\Entity\Step;
use App\Entity\Level;
use App\Form\StepType;
use App\Repository\AnswerRepository;
use App\Repository\LanguageRepository;
use App\Repository\LevelRepository;
use App\Repository\QuestionRepository;
use App\Repository\TestRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Tomsgu\PdfMerger\PdfMerger;
use Symfony\Component\HttpFoundation\Session\Session;


class StepController extends AbstractController
{

    private $session;
    /**
     * @var LanguageRepository
     */
    private $languageRepository;
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var TestRepository
     */
    private $testRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;
    /**
     * @var ObjectManager
     */
    private $em;
    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    private $merger;

    /**
     * StepController constructor.
     * @param SessionInterface $session
     * @param LanguageRepository $languageRepository
     * @param QuestionRepository $questionRepository
     * @param TestRepository $testRepository
     * @param LevelRepository $levelRepository
     * @param AnswerRepository $answerRepository
     * @param PdfMerger $merger
     */
    public function __construct( SessionInterface $session, LanguageRepository $languageRepository, QuestionRepository $questionRepository, TestRepository $testRepository, LevelRepository $levelRepository, AnswerRepository $answerRepository, PdfMerger $merger) {
        $this->session = $session;
        $this->languageRepository = $languageRepository;
        $this->questionRepository = $questionRepository;
        $this->testRepository = $testRepository;
        $this->levelRepository = $levelRepository;
        $this->answerRepository = $answerRepository;
        $this->merger = $merger;
    }

    /**
     * @Route("/test/steps/", name="test.steps")
     * @param Request $request
     * @return Response
     */
    public function steps( Request $request){
        if (isset($_SESSION['questions']) && isset($_SESSION['inc'])) {
            unset($_SESSION['questions']);
            unset($_SESSION['inc']);
        }
        $langues = $this->languageRepository->findAll();
        $steps = new Step();
        $form = $this->createForm(StepType::class, $steps);
        $form->handleRequest($request);

        return $this->render('step/index.html.twig', [
            'form' => $form->createView(),
            'langues' => $langues,
        ]);
    }


    /**
     * @Route("/test/steps/mail", name="test.steps.mail")
     * @param Request $request
     * @return Response
     */

    public function sendMail($name, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Résultat de '.$name))
            ->setFrom('adb@promeo-formation.fr')
            ->setTo('recipient@example.com')
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'emails/test.html.twig'
                ),
                'text/html'
            )
            ->attach(Swift_Attachment::fromPath('public/pdf/'.$name.'.pdf'));

        $mailer->send($message);
        unlink('/public/'.$name.'.pdf');
    }

    /**
     * @Route("/test/steps/verify",name="verify.steps")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function verifyStep(Request $request){
        if ($request->isMethod('post')) {
            $params = $request->request->all();
            $params = $params['step'];
            $_SESSION['params'] = $params;
            $langue = $params['langage'];
            $level = "A1";
            return $this->redirectToRoute('view.steps',compact('langue','level'));
        }
    }
    /**
     * @Route("/test/steps/{level}/{langue}",name="view.steps")
     */
    public function viewStep($level,$langue){
        $max = sizeof($this->questionRepository->findAll());
        if (isset($_SESSION['inc'])){
            $_SESSION['inc'] = $_SESSION['inc']+1;
        }
        else{
            $_SESSION['inc'] = 0;
            $nombres = range(1,$max);
            shuffle($nombres);
            $_SESSION['questions'] = $nombres;
        }
        $inc = $_SESSION['inc'];
        $tab = $_SESSION['questions'];
        if ($inc >= $max){
            unset($_SESSION['questions']);
            unset($_SESSION['inc']);
            return $this->redirectToRoute('test.steps.validation',
                array(
                    'level' => $level,
                    'langue' => $langue
                ));
        }
        $rand = $tab[$inc];

        $level = $this->levelRepository->findOneBy(['name' => $level]);
        $langue = $this->languageRepository->findOneBy(['name' => $langue]);
        $test = $this->testRepository->findOneBy(['language' => $langue, 'isOn' => 1 ]);
        $timer = $test->getTimer();
        $question = $this->questionRepository->findOneBy(['id' => $rand,
            'level' => $level]);
        $answers = $this->answerRepository->findBy(['question' => $question]);
        //if($test) {
        return $this->render('step/step5'.$level->getName().'.html.twig',
            array(
                'level' => $level,
                'test' => $test,
                'langue' => $langue,
                'question' => $question,
                'answers'=>$answers,
                'timer_value' =>$timer
            ));
       // }else{
      //      return $this->render('step/step5'.$level->getName().'.html.twig');
      //  }
    }

    /**
     * @Route("/test/steps/{level}/{langue}/validation", name="test.steps.validation")
     */
    public function validStep(Request $request, $level, $langue){
        //$langue = $request->get('langue');
        $_SESSION['good_answer'] = 0;
        $test = $this->levelRepository->findAll();
        $max = sizeof($test);
        $position_down = $test[0];
        $position_Up = $test[1];
        // Define user pass for level
        for ($i = 0; $i < $max; $i++){
            if($test[$i]->getName() == $level){
                if ($test[$max-1]->getName() == $level){
                    $position_Up = $test[$max-1];
                }
                else{
                    $position_Up = $test[$i +1];
                }
                if ($i-1 < 0){
                    $position_down = $test[0];
                }
                else{
                    $position_down = $test[$i-1];
                }
                if ($i == 0){
                    $position_down = $test[0];
                }
            }
        }
        $level_up= $position_Up->getName();
        $level_down = $position_down->getName();

        $nb_question= 0;
        $question_max = $this->questionRepository->findAll();
        $question_max = sizeof($question_max);

        $iterations = $request->get('iterations');
        // Check of users data
        for($i = 1; $i < $iterations+1; $i++){
            $question = $request->get('question'.$i);
            $answer = $request->get('answer'.$i);
            //$answer_valid = $request->get('isconnected');
            //$valid_question = $this->questionRepository->findOneBy(['wording' => $question]);
            //$valid_answer = $this->answerRepository->findOneBy(['answer' => $answer]);
            if($answer == 1){
                $_SESSION['good_answer'] = $_SESSION['good_answer'] +1;
            }
        }
        $min = $this->levelRepository->findOneBy(['name' => $level])->getMinReponse();

        if($_SESSION['good_answer'] >= $min ){
            return $this->redirectToRoute('view.steps',array('langue' => $langue, 'level'=>$level_up));
        }
        else {
            $steps = $_SESSION['params'];
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Segoe UI');
            $pdfOptions->set('isHtml5ParserEnabled', 'true');
            $pdfOptions->set('enable_remote', true);
            $dompdf = new Dompdf($pdfOptions);
            $html = $this->renderView('pdf/pdf.html.twig', compact('steps'));
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $output = $dompdf->output();
            $publicDirectory = '../public/pdf';
            $pdfFilepath = $publicDirectory . '/ADB_'.$steps['last_name'].'_'.$steps['first_name'].'.pdf';
            file_put_contents($pdfFilepath, $output);
            return $this->render('step/result.html.twig', compact('level'));
        }
    }
}
