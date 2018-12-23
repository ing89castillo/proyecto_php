<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{

    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@App/Usuario/Security/login.html.twig',array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }

    /**
     * @Route ("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        // return $this->redirectToRoute('login');
    }
}