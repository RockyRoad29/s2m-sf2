<?php

namespace RR\S2MBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Salut")')->count() > 0);
    }

    public function testIndexName()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tester');

        $this->assertTrue($crawler->filter('html:contains("Salut cher tester")')->count() > 0);
    }
}
