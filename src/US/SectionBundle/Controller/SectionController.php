<?php

namespace US\SectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SectionController extends Controller
{
    public function indexAction()
    {
        return $this->render('USSectionBundle:Section:index.html.twig', array(
                // ...
            ));    }

    public function addAction()
    {
        return $this->render('USSectionBundle:Section:add.html.twig', array(
                // ...
            ));    }

    public function editAction()
    {
        return $this->render('USSectionBundle:Section:edit.html.twig', array(
                // ...
            ));    }

    public function deleteAction()
    {
        return $this->render('USSectionBundle:Section:delete.html.twig', array(
                // ...
            ));    }

    public function viewAction($slug)
    {
        return $this->render('USSectionBundle:Section:view.html.twig', array(
                // ...
            ));    }

}
