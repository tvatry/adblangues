<?php


namespace App\Controller\Admin;

use App\Repository\HomeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class DashboardController extends AbstractController
{
    private $home;

    public function __construct(HomeRepository $home)
    {
        $this->home = $home;
    }

    /**
     * @Route("/admin/", name="admin_dashboard")
     */
    public function index()
    {
        $home = $this->home->findOneBy(['id' => 1]);
        return $this->render('/backoffice/dashboard.html.twig', [
            'home' => $home
        ]);
    }

    /**
     * @Route("/admin/accueil/save", name="homepageSave")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function update(Request $request)
    {
        $home = $this->home->findOneBy(['id' => 1]);
        $home->setCkeditor($request->get('ckeditor'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($home);
        $entityManager->flush();

        return $this->redirectToRoute('admin_dashboard');
    }
}
