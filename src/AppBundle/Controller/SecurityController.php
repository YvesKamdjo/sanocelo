<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        if ($form->handleRequest($request)->isValid()) {

            //Recupère le service Symfony pour crypter le MDP
            $encoder    = $this->get('security.encoder_factory')
                                ->getEncoder($user);

            //Utilise l'encodeur pour crypter le MDP
            $user->setPassword(
                $encoder->encodePassword(
                    $user->getPlainPassword(),
                    null
                )
            );

            $user->setRoles(['ROLE_USER']);

            $em     = $this->getDoctrine()->getManager();
            $em->persist($user);

            $em->flush();
            $this->addFlash('success','Youpi');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('AppBundle:Security:register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     *
     */
    public function loginAction(){

        $authenticationUtils    = $this->get('security.authentication_utils');

        $error                  = $authenticationUtils->getLastAuthenticationError();

        return $this->render('AppBundle:Security:login.html.twig',[
            'error'=>$error,
        ]);
    }
}