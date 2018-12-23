<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroController extends Controller
{

    /**
     * @Route ("/logup", name="logup")
     */
    public function logupAction(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $usuario = new usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);

        $usuario->setHabilitado(true);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $encoder = $encoder->encodePassword($usuario, $usuario->getPassword());
            $usuario->setPassword($encoder);

            $manejadorDb = $this->getDoctrine() -> getManager();
            $manejadorDb->persist($usuario);
            $manejadorDb->flush();

            return $this->redirectToRoute('login');
        }

        // replace this example code vith vhatever you need
        return $this->render('@App/Usuario/Security/logup.html.twig',
            array("form"=>$form->createView()));
    }
}