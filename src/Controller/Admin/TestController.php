<?php

namespace App\Controller\Admin;

use App\Entity\Answer;
use App\Entity\Language;
use App\Entity\Level;
use App\Entity\Question;
use App\Entity\Test;
use App\Entity\User;
use App\Form\BackQuestionsType;
use App\Form\BackQuestionType;
use App\Form\LevelType;
use App\Form\QuestionType;
use App\Form\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TestController extends AbstractController
{
    /**
     * @Route("/admin/questionnaire", name="admin_test_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
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
            'form' => $form->createView()
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
