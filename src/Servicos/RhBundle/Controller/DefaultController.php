<?php

namespace Servicos\RhBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ServicosRhBundle:Default:index.html.twig', array('name' => $name));
    }
}
