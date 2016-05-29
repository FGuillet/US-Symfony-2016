<?php

namespace US\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManageController extends Controller
{
    public function indexAction()
    {

      return $this->render('USCoreBundle:Manage:index.html.twig', array(
              // ...
          ));
    }

}
