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
         return array();
    }

    /**
     * This action may try anything for testing purposes.
     * 
     * @Route("/sandbox/{name}", defaults={"name"="SEListe"})
     * @Template() 
     * default: 'S2MBundle:Default:sandbox.html.twig' 
     */
    public function sandboxAction($name)
    {
	// invoque le template avec les arguments suivants
        return array('name' => $name, 
                'message' =>  $this->get('translator')->trans('Symfony2 is great'),
            'count' => 1);
    }
}
