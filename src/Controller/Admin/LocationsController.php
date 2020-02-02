<?php

namespace App\Controller\Admin;

use App\Entity\Locations;
use App\Form\LocationsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController
{

    /**
     * @Route("/admin/centre", name="admin_locations_index")
     */
    public function index()
    {
        $allLocations = $this->getDoctrine()->getRepository(Locations::class);
        $location = $allLocations->findAll();
        return $this->render('/backoffice/locations/index.html.twig', [
            'location' => $location,
        ]);
    }
    /**
     * @Route("/admin/centre/ajout", name="admin_locations_create")
     */
    public function create(Request $request)
    {
        $locations = new Locations();

        $form = $this->createForm(LocationsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            for ($i = 0; $i <= 9; $i++) {
                if(preg_match("#[_@1-9]#", $form->get('name')->getData())){
                    return $this->redirectToRoute('admin_locations_create');
                }
            }
            $locations = $form->getData();

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($locations);
            $entitymanager->flush();

            return $this->redirectToRoute('admin_locations_index');
        }

        return $this->render('backoffice/locations/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/centre/edition/{id}", name="admin_locations_update")
     */
    public function update($id, Request $request)
    {
      $allLocations = $this->getDoctrine()->getManager();
      $locations = $allLocations->getRepository(Locations::class)->find($id);

      $form = $this->createForm(LocationsType::class, $locations);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $allLocations->flush();

            return $this->redirectToRoute('admin_locations_index');
        }

        return $this->render('backoffice/locations/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/centre/suppression/{id}", name="admin_locations_delete")
     */
    public function delete($id, Request $request)
    {
       $allLocations = $this->getDoctrine()->getManager();
       $deleteLocation = $allLocations->getRepository(Locations::class)->find($id);

       $allLocations->remove($deleteLocation);
       $allLocations->flush();

      return $this->redirectToRoute('admin_locations_index');
    }

    }
