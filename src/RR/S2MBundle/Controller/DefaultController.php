<?php

namespace RR\S2MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template() 
     * default: 'S2MBundle:Default:index.html.twig' 
     */
    public function indexAction()
    {
    }
    /**
     * @Route("/user/{name}", defaults={"name"="SEListe"})
     * @Template() 
     * default: 'S2MBundle:Default:user.html.twig' 
     */
    public function userAction($name)
    {
	// invoque le template avec les arguments suivants
        return array('name' => $name);
    }
}
