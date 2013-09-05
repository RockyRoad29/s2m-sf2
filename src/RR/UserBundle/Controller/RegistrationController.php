<?php
// src/RR/UserBundle/Controller/RegistrationController.php
namespace RR\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Allows to add some functionality to the registerAction of a 
 * RegistrationController that lives inside FOSUserBundle. 
 */
class RegistrationController extends BaseController
{
    public function registerAction(Request $request)
    {
        $response = parent::registerAction($request);

        // ... do custom stuff
        return $response;
    }
}
