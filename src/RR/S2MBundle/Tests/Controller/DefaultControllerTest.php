<?php

namespace RR\S2MBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Bienvenue")')->count() > 0);
    }

    public function testUserName()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/tester');

        $this->assertTrue($crawler->filter('html:contains("Salut cher tester")')->count() > 0);
    }

    public function testUserDefault()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');

        $this->assertTrue($crawler->filter('html:contains("Salut cher SEListe")')->count() > 0);
    }
}
