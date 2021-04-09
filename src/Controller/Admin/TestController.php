<?php

namespace App\Controller\Admin;

use App\Entity\Answer;
use App\Entity\AnswerImport;
use App\Entity\Language;
use App\Entity\Level;
use App\Entity\Question;
use App\Entity\Test;
use App\Entity\User;
use App\Form\AnswerImportType;
use App\Form\BackQuestionsType;
use App\Form\BackQuestionType;
use App\Form\LevelType;
use App\Form\QuestionType;
use App\Form\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TestController extends AbstractController
{
    /**
     * @Route("/admin/questionnaire", name="admin_test_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Test::class);
        $surveys = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository(Language::class);
        $languages = $repository->findAll();



        return $this->render('/backoffice/test/index.html.twig', [
            'surveys' => $surveys,
            'languages' => $languages,
        ]);
    }

    /**
     * @Route("/admin/questionnaire/ajout", name="admin_test_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $survey = new Test();

        $form = $this->createForm(TestType::class);
        $form->handleRequest($request);

        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            /*$survey = $form->getData();*/

            $survey->setTestName($form->get("testName")->getData());
            $survey->setIsOn($form->get("isOn")->getData());
            $survey->setLanguage($form->get("language")->getData());
            $survey->setTimer($form->get("timer")->getData());
            $survey->setCreatedBy($user);
            $entitymanager = $this->getDoctrine()->getManager();

            $entitymanager->persist($survey);
            $entitymanager->flush();

            return $this->redirectToRoute('admin_test_index');
        }

        return $this->render('backoffice/test/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/questionnaire/edition/{id}", name="admin_test_update")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function update($id, Request $request)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $survey = $entitymanager->getRepository(Test::class)->find($id);
        $form = $this->createForm(TestType::class, $survey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entitymanager->flush();

            return $this->redirectToRoute('admin_test_index');
        }
        return $this->render('backoffice/test/edit.html.twig', [
            'form' => $form->createView(),
            'id' => $id,
        ]);
    }

    /**
     * @Route("/admin/questionnaire/questions/ajout/{id}/{level_id}", name="admin_test_add_questions")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function addQuestions($id, $level_id, Request $request)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $test = $entitymanager->getRepository(Test::class)->find($id);
        $level = $entitymanager->getRepository(Level::class)->find(1);
        $form = $this->createForm(BackQuestionsType::class);
        $form->handleRequest($request);
        $ai = new AnswerImport();
        $formFile = $this->createForm(AnswerImportType::class, $ai);
        $formFile->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $length = count($form->get('questions')->getData());

            for ($i=1; $i<$length+1; $i++){
                $question = new Question();
                $question->setWording($form->get('questions')[$i]['wording']->getData());
                $question->setLevel($form->get('level')->getData());
                $question->setTest($test);
                $entitymanager->persist($question);
                $entitymanager->flush();
                for ($j=1; $j<4+1; $j++){
                    if ($form->get('questions')[$i]['answer'.$j.'']->getData() != null){
                        $answer = new Answer();
                        $answer->setAnswer($form->get('questions')[$i]['answer'.$j.'']->getData());
                        //$answer->setIsConnected($form->get('answers')[$i]['isConnected']->getData());
                        $answer->setIsConnected($form->get('questions')[$i]['isConnected'.$j.'']->getData());
                        $answer->setQuestion($entitymanager->getRepository(Question::class)->find($question->getId()));
                        $entitymanager->persist($answer);
                        $entitymanager->flush();
                    }
                }
            }
            return $this->redirectToRoute('admin_test_index');
        }

        $repository = $this->getDoctrine()->getRepository(Question::class);
        $question_all = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository(Answer::class);
        $answer_all = $repository->findAll();

        $loop = 0;

        return $this->render('backoffice/test/add_questions.html.twig', [
            'formlevel' => $level,
            'form' => $form->createView(),
            'formFile' => $formFile->createView()

        ]);
    }

    /**
     * @Route("/admin/questionnaire/questions/edition/{idtest}", name="admin_test_edit_questions")
     * @param $idtest
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function editQuestions($idtest, Request $request)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $test = $entitymanager->getRepository(Test::class)->find($idtest);
        $q = $test->getQuestion();
        $arrayQ = array();
        foreach ($q as $question) {
            //dump($question->getAnswer()[0]); die;
            $form = $this->createForm(QuestionType::class, $question)->createView();
            array_push($arrayQ, $form);
        }

        //$form->handleRequest($request);

        /*if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('admin_test_index');
        }*/
        return $this->render('backoffice/test/edit_questions.html.twig', [
            'form' => $arrayQ,
        ]);
    }

    /**
     * @Route("/admin/questionnaire/export/{idtest}", name="admin_questionnaire_export")
     * @param $idtest
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function exportQuestionnaire($idtest, Request $request)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $test = $entitymanager->getRepository(Test::class)->find($idtest);
        $q = $test->getQuestion();

        $spreadsheet = new Spreadsheet();

        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('C1', $test->getTestName());
        $sheet->setCellValue('A3', "Niveau");
        $sheet->setCellValue('B3', "Question");
        $sheet->setCellValue('C3', "Reponse A");
        $sheet->setCellValue('D3', "Reponse B");
        $sheet->setCellValue('E3', "Reponse C");
        $sheet->setCellValue('F3', "Reponse A");
        $sheet->setCellValue('G3', "Bonne réponse");


        $line = 4;
       foreach ($q as $question) {
           $sheet->setCellValue('A'.$line, $question->getLevel()->getName());
           $sheet->setCellValue('B'.$line, $question->getWording());
           $sheet->setCellValue('C'.$line, $question->getAnswer()[0]->getAnswer());
           $sheet->setCellValue('D'.$line, $question->getAnswer()[1]->getAnswer());
           $sheet->setCellValue('E'.$line, $question->getAnswer()[2]->getAnswer());
           $sheet->setCellValue('F'.$line, $question->getAnswer()[3]->getAnswer());

           $good = "";
           if($question->getAnswer()[0]->getIsConnected() == true){
               $good .= "A";
           }
           if($question->getAnswer()[1]->getIsConnected() == true){
               $good .= "B";
           }
           if($question->getAnswer()[2]->getIsConnected() == true){
               $good .= "C";
           }
           if($question->getAnswer()[3]->getIsConnected() == true){
               $good .= "D";
           }
           $sheet->setCellValue('G'.$line, $good    );



           $line++;
       }


        $sheet->setTitle($test->getTestName());

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(50);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(10);
        
        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);

        // Create a Temporary file in the system
        $fileName = $test->getTestName().'.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);

        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);


    }



    /**
     * @Route("/admin/questionnaire/suppression/{id}", name="admin_test_delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function delete($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $survey = $em->getRepository(Test::class)->find($id);

        $em->remove($survey);
        $em->flush();
        return $this->redirectToRoute('admin_test_index');
    }
}
