<?php

namespace RR\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * This class allows to override parts of FOSUserBundle, as needed.
 * see http://symfony.com/doc/current/cookbook/bundles/inheritance.html
 */
class RRUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
