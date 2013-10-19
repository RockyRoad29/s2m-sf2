<?php

// src/RR/S2MBundle/Menu/MenuBuilder.php

namespace RR\S2MBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder {

    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory) {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request) {
        $menu = $this->factory->createItem('root');
        $menu->addChild('Accueil', array('route' => 'rr_s2m_default_index'));
        $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
        $menu->addChild('Déconnexion', array('route' => 'fos_user_security_logout'));

        $menu->addChild('À propos de moâ', array(
            'route' => 'rr_s2m_default_user',
            'routeParameters' => array('name' => 'Mon auguste personne vous salue !')
        ));
        // ... add more children

        return $menu;
    }

}
