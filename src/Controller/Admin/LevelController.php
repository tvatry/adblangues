<?php

namespace App\Controller\Admin;

use App\Entity\Level;
use App\Form\LevelType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LevelController extends AbstractController
{
    /**
     * @Route("/admin/niveau", name="admin_level_index")
     */
    public function index()
    {
        $allLevel = $this->getDoctrine()->getRepository(Level::class);
        $level = $allLevel->findAll();

        return $this->render('/backoffice/level/index.html.twig', [
            'level' => $level,
        ]);
    }

    /**
     * @Route("/admin/niveau/edition/{id}", name="admin_level_update")
     */
    public function update($id, Request $request)
    {
      $allLevel = $this->getDoctrine()->getManager();
      $level = $allLevel->getRepository(Level::class)->find($id);

      $form = $this->createForm(LevelType::class, $level);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $allLevel->flush();

            return $this->redirectToRoute('admin_level_index');
        }

        return $this->render('backoffice/level/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    }
