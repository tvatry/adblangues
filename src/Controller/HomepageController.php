<?php

namespace App\Controller;

use App\Entity\Home;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    private $home;

    public function __construct(HomeRepository $home)
    {
        $this->home = $home;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    /**
     * @Route("/admin/accueil/edit", name="homepageBack")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexBack() {
        $home = $this->home->findOneBy(['id' => 1]);

        return $this->render('backoffice/homepage/index.html.twig', [
            'home' => $home
        ]);
    }

    /**
     * @Route("/admin/accueil/save", name="homepageSave")
     *
     * @param Request $request
     */
    public function update(Request $request) {
        $home = $this->home->findOneBy(['id' => 1]);
        $home->setCkeditor($request->get('ckeditor'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($home);
        $entityManager->flush();

        return $this->redirectToRoute('homepageBack');
    }
}
