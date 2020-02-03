<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\CreateUserType;
use App\Form\EditUserType;
use App\Form\ValidUserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    private $repo_user;
    private $passwordEncoder;

    public function __construct(UserRepository $repo_user, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->repo_user = $repo_user;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/admin/utilisateur/ajout", name="admin_users_create")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function create_user(Request $request, \Swift_Mailer $mailer, UserInterface $currentUser)
    {
        $user = new User();
        $user->setRoles([]);
        $form = $this->createForm(CreateUserType::class, $user);
        if($currentUser->getRoles()[0] != "ROLE_SUPER_ADMIN") {
            $form->add('roles', ChoiceType::class, [
                'label' => 'Role',
                'choices' => array(
                    'Formateur' => '["ROLE_FORMATEUR"]',
                ),
                'mapped' => false
            ]);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On complète l'Entity
            $username = $form->get("username")->getData();
            $email = $form->get("username")->getData().'@promeo-formation.fr';
            $roles = array($form->get("roles")->getData());
            $role = $roles;
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setRoles($role);
            $user->setIsActive(false);
            $user->setToken(time());
            $user->setPassword("");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // On envoye le mail

            $lien = "/valider_utilisateur/" . $user->getToken();

            $send_email = (new \Swift_Message('Inscription à ADBLangue'))
                ->setFrom('adblangue@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'security/send_mail_new_user.html.twig',
                        ['lien' => $lien,
                            'username' => $user->getUsername(),
                            'token' => "/".$user->getToken()]
                    ),
                    'text/html');

            $mailer->send($send_email);
            return $this->redirectToRoute("admin_users_index");
        }

        return $this->render('backoffice/user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/valider_utilisateur/{timestamp}", name="valider_utilisateur")
     */
    public function valid_user(Request $request, $timestamp, UserPasswordEncoderInterface $encoder)
    {
        $user = $this->repo_user->findOneBy([
            'Token' => $timestamp,
            'Is_Active' => false,
        ]);

        $form = $this->createForm(ValidUserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get("password")->getData();
	    $encoded = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);
            $user->setIsActive(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute("homepage");
        }

        return $this->render('backoffice/user/validate.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/utilisateur/index", name="admin_users_index")
     */
    public function list_user(Request $request)
    {
        $users = $this->repo_user->findAll();

        return $this->render('backoffice/user/index.html.twig', [
            'users' => $users
        ]);
    }
    /**
     * @Route("/admin/utilisateur/edition/activation/{username}", name="admin_users_active")
     * @param $username
     * @return RedirectResponse
     */
    public function define_activation($username)
    {
        $user = $this->repo_user->findOneBy(['username' => $username]);
        if ($user->getIsActive() == 1){
            $user->setIsActive(0);
        }
        else{
            $user->setIsActive(1);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute("admin_users_index");
    }

    /**
     * @Route("/admin/utilisateur/edition/{username}", name="admin_users_edit")
     * @param Request $request
     * @param $username
     * @return Response
     */
    public function edit_user(Request $request, $username, UserInterface $currentUser)
    {
        $user = $this->repo_user->findOneBy(['username' => $username]);

        $form = $this->createForm(EditUserType::class, $user);
        if($currentUser->getRoles()[0] != "ROLE_SUPER_ADMIN") {
            $form->add('roles', ChoiceType::class, [
                'label' => 'Role',
                'choices' => array(
                    'Formateur' => '["ROLE_FORMATEUR"]',
                ),
                'mapped' => false
            ]);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $role[0] = $form->get("roles")->getData();
            $user->setRoles($role);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('backoffice/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/utilisateur/suppression/{username}", name="admin_users_delete")
     * @param Request $request
     * @param $username
     * @return Response
     */
    public function delete_user(Request $request, $username)
    {
        $user = $this->repo_user->findOneBy(['username' => $username]);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("admin_users_index");
    }

    /**
     * @Route("/admin/reinitialiser_mdp/{username}", name="reinitialiser_mdp")
     * @param $username
     * @param \Swift_Mailer $mailer
     * @return RedirectResponse
     */
    public function reinitialiser_mdp($username, \Swift_Mailer $mailer)
    {
        $user = $this->repo_user->findOneBy(['username' => $username]);

        $user->setIsActive(false);
        $user->setToken(time());
        $user->setPassword("");
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $lien = "/valider_utilisateur/" . $user->getToken();

        $send_email = (new \Swift_Message('Réinitialisation du mot de passe pour ADBLangue'))
            ->setFrom('adblangue@gmail.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->renderView(
                    'backoffice/user/mail.html.twig',
                    ['lien' => $lien,
                        'username' => $user->getUsername(),
                        'token' => "/".$user->getToken()]
                ),
                'text/html');

        $mailer->send($send_email);

        return $this->redirectToRoute("admin_users_index");
    }
}
