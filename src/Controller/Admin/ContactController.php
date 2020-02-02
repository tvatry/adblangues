<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/admin/contact", name="admin_contacts_index")
     */
    public function index()
    {
        $allContacts = $this->getDoctrine()->getRepository(Contact::class);
        $contact = $allContacts->findAll();

        return $this->render('/backoffice/contact/index.html.twig', [
            'contacts' => $contact,
        ]);
    }
    /**
     * @Route("/admin/contact/ajout", name="admin_contacts_create")
     */
    public function create(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($contact);
            $entitymanager->flush();

            return $this->redirectToRoute('admin_contacts_index');
        }

        return $this->render('backoffice/contact/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/contact/edition/{id}", name="admin_contacts_update")
     */
    public function update($id, Request $request)
    {
      $allContacts = $this->getDoctrine()->getManager();
      $contact = $allContacts->getRepository(Contact::class)->find($id);

      $form = $this->createForm(ContactType::class, $contact);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $allContacts->flush();

            return $this->redirectToRoute('admin_contacts_index');
        }

        return $this->render('backoffice/contact/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/contact/suppression/{id}", name="admin_contacts_delete")
     */
    public function delete($id, Request $request)
    {
       $allContacts = $this->getDoctrine()->getManager();
       $deleteContact = $allContacts->getRepository(Contact::class)->find($id);

       $allContacts->remove($deleteContact);
       $allContacts->flush();

      return $this->redirectToRoute('admin_contacts_index');
    }

    }
