<?php

namespace RR\AdsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'ads/');
        $this->assertTrue($crawler->filter('html:contains("Nos pokous n\'ont pas de prix")')->count() > 0);
    }
    public function testListe()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/ads/list');
        $this->assertTrue($crawler->filter('html:contains("Nos Annonces")')->count() > 0);
    }
}
