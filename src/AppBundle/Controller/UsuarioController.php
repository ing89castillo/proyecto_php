<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
//        $usuario = new Usuario();
//        $usuario->setNombre("Luis");
//        $usuario->setApellido("Castillo");
//        $usuario->setEmail("lcastillo@gmail.com");
//
//        $encoder = $encoder->encodePassword($usuario, "1234");
//
//        $usuario->setPassword($encoder);
//        $usuario->setHabilitado("true");
//
//        $conexion = $this->getDoctrine()->getManager();
//        $conexion->persist($usuario);
//        $conexion->flush();


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'usuario' => "Luis Castillo"
        ]);
    }

    /**
     * @Route("/showUsers", name="showUsers")
     */
    public function ver_usuarioAction(Request $request)
    {
        $usuarios = $this->getDoctrine()->getRepository(Usuario::class)->findAll();


        // replace this example code with whatever you need
        return $this->render('@App/Usuario/show_user.html.twig',[
            "usuarios" => $usuarios
        ]);
    }
}