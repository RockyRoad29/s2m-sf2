<?php

namespace RR\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'user/moa');

        $content = $crawler->filter("#content")->text();
        print_r("Testing: " . $client->getRequest()->getRequestUri());
        print_r($content);
        $this->assertEquals(1,preg_match("/Salut cher moa/", $content));
    }
}
