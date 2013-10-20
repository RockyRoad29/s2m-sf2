<?php

namespace RR\S2MBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
           private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }


    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Bienvenue")')->count() > 0);
    }

    public function testSandbox()
    {
        $crawler = $this->client->request('GET', '/sandbox/Castle');
        //$content = $crawler->filter('#content');
        $this->assertTrue($crawler->filter('#content:contains("Castle")')->count() > 0);
        $this->assertTrue($crawler->filter('#content:contains("aime Symfony2")')->count() > 0);
    }
}
