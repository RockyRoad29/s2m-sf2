<?php
// src/RR/S2MBundle/Menu/Builder.php
namespace RR\S2MBundle\Menu;
/*
Note You only need to extend ContainerAware if you need the service container to be available via $this->container. You can also implement ContainerAwareInterface instead of extending this class.

Note The menu builder can be overwritten using the bundle inheritance.
*/
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

	$menu->addChild('Accueil', array('route' => 'rr_s2m_default_index'));
        $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
        $menu->addChild('À propos de moâ', array(
            'route' => 'rr_s2m_default_user',
            'routeParameters' => array('name' => 'Mon auguste personne vous salue !')
        ));
        // ... add more children

        return $menu;
    }
}
