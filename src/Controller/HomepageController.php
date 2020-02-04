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
        $home = $this->home->findOneBy(['id' => 1]);

        $home = htmlspecialchars_decode($home->getCkeditor());

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController', 'home' => $home
        ]);
    }
}
