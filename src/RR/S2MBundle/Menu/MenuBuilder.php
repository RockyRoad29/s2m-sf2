<?php

// src/RR/S2MBundle/Menu/MenuBuilder.php

namespace RR\S2MBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\SecurityContextInterface;

class MenuBuilder {

    private $factory;
    private $securityContext;

    /**
     * 
     * @param FactoryInterface $factory
     * @param SecurityContextInterface $securityContext
     */
    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext) {
        $this->factory = $factory;
        $this->securityContext = $securityContext;
    }

    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request) {
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());
        
        $menu->addChild('Accueil', array('route' => 'rr_s2m_default_index'));

        if ($this->securityContext->isGranted('ROLE_ADMIN') !== false) {
            // $menu->addChild('Admin', array('route' => 'rr_s2m_admin_index'));
             $menu->addChild('Admin', array('route' => 'rr_s2m_default_index'));
        }
        if (!$this->securityContext->isGranted('ROLE_USER') !== false) {
            $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
            $menu->addChild('S\'inscrire', array('route' => 'fos_user_registration_register'));
        } else {
            $menu->addChild('Déconnexion', array('route' => 'fos_user_security_logout'));
            $menu->addChild('Changer de mdp', array('route' => 'fos_user_change_password'));

            $username = $this->securityContext->getToken()->getUsername();
            $menu->addChild("À propos de $username", array(
                'route' => 'rr_s2m_default_user',
                'routeParameters' => array('name' => $username)
            ));
        }
        // ... add more children

        return $menu;
    }

}
