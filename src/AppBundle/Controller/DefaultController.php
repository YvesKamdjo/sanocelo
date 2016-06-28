<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:default:index.html.twig');
      /*  return $this->render('default/index.html.twig', array(
            'base_dir' => str_replace('/', DIRECTORY_SEPARATOR, realpath($this->getParameter('kernel.root_dir').'/../').'/'),
        ));*/
    }

    /**
     * @param $contentDocument
     * @return array
     * @Route("/page/{name}", name="cms_page"))
     */
    public function pageAction($name){
        $dm = $this->get('doctrine_phpcr')->getManager();
        $posts = $dm->getRepository('AppBundle:Post')->find('sanocelo/posts/'.$name.'/'.$name.'-first');
        $page = $dm->getRepository('AppBundle:Page')->find('sanocelo/pages/'.$name);

        return $this->render('AppBundle:default:page.html.twig',
            array(
            'page'  => $page,
            'posts' => $posts,
            'title' => $name
        )
        );
    }

    /**
     * @param $title
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sonatapageAction($contentDocument){
        $dm = $this->get('doctrine_phpcr')->getManager();
        $posts = $dm->getRepository('AppBundle:Post')->findAll();

        return $this->render('AppBundle:default:page.html.twig',
            array(
            'page'  => 'Test',
            'posts' => $posts,
            'title' => $contentDocument
        )
        );
    }
}
