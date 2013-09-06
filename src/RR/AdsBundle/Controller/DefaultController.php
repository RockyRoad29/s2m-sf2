<?php

namespace RR\AdsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Page d'accueil des annonces.
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    /**
     * @Route("/list/{categ}", defaults={"categ"="All"})
     * @Template()
     */
    public function listAction($categ)
    {
        return array('categ' => $categ);
    }
}
