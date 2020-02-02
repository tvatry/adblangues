<?php

namespace App\Controller\Admin;

use App\Entity\Language;
use App\Form\LanguageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    /**
     * @Route("/admin/langue", name="admin_language_index")
     */
    public function index()
    {
        $allLanguage = $this->getDoctrine()->getRepository(Language::class);
        $languages = $allLanguage->findAll();

        return $this->render('/backoffice/language/index.html.twig', [
            'languages' => $languages,
        ]);
    }

    /**
     * @Route("/admin/langue/ajout", name="admin_language_create")
     */
    public function create(Request $request)
    {
        $language = new Language();

        $form = $this->createForm(LanguageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $language = $form->getData();

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($language);
            $entitymanager->flush();

            return $this->redirectToRoute('admin_language_index');
        }

        return $this->render('backoffice/language/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/langue/edition/{id}", name="admin_language_update")
     */
    public function update($id, Request $request)
    {
      $allLanguage = $this->getDoctrine()->getManager();
      $language = $allLanguage->getRepository(Language::class)->find($id);

      $form = $this->createForm(LanguageType::class, $language);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $allLanguage->flush();

            return $this->redirectToRoute('admin_language_index');
        }

        return $this->render('backoffice/language/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/langue/suppression/{id}", name="admin_language_delete")
     */
    public function delete($id, Request $request)
    {
       $allLanguage = $this->getDoctrine()->getManager();
       $deleteLanguage = $allLanguage->getRepository(Language::class)->find($id);

       $allLanguage->remove($deleteLanguage);
       $allLanguage->flush();

      return $this->redirectToRoute('admin_language_index');
    }

    }
