<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig', [
            'test' => 'je test'
        ]);
    }

   public function notreVisionAction(){
        return $this->render('AppBundle:Default:notrevision.html.twig');
   }
    public function solutionsAction(){
        return $this->render('AppBundle:Default:solutions.html.twig');
    }

    public function contextAction(){
        return $this->render('AppBundle:Default:context.html.twig');
    }

    public function mediasAction(){
        return $this->render('AppBundle:Default:medias.html.twig');
    }

    public function partenairesAction(){
        return $this->render('AppBundle:Default:partenaires.html.twig');
    }

    public function contactAction(){
        return $this->render('AppBundle:Default:contact.html.twig');
    }
}
