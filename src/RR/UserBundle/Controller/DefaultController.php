<?php

namespace RR\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller {

    /**
     * Retrieving the security identity of the currently logged-in user
     * @return type
     */
    private function getConnectedUser() {
        return $this->container->get('security.context')->getToken()->getUser();
    }

    /**
     * This will build the generic user welcome page
     * @Route("/")
     * @Template()
     */
    public function indexAction() {
        return array();
    }

    /**
     * This will display the public profile of the named user.
     * @Route("/about/{name}")
     * @Template()
     */
    public function aboutAction($name) {
        return array('name' => $name);
    }

    /**
     * This will return the profile page of the connected user.
     * @Route("/myspace")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function myspaceAction() {
        $user = $this->getConnectedUser();

//        return array('user' => array('name' => $user->getUserName()));
        return array('user' => $user);
    }

}
