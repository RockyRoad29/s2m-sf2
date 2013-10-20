<?php

namespace RR\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
//use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultControllerTest extends WebTestCase {

    private $client = null;

    public function setUp() {
        $this->client = static::createClient();
        $this->container = $this->client->getContainer();
    }

    public function doLogin($username, $password) {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('_submit')->form(array(
            '_username' => $username,
            '_password' => $password,
        ));
        $this->client->submit($form);

        $this->assertTrue($this->client->getResponse()->isRedirect());

        $crawler = $this->client->followRedirect();
    }

    public function testIndex() {
        $crawler = $this->client->request('GET', '/user/');
        $this->assertTrue($crawler != null);
        $this->assertTrue($crawler->filter('h2:contains("Les gens")')->count() > 0);
        $this->assertTrue($crawler->filter('#content:contains("Les gens")')->count() > 0);
    }

    public function testAbout() {
        $crawler = $this->client->request('GET', '/user/about/Fabien');

        $this->assertTrue($crawler->filter('#content:contains("À propos de Fabien")')->count() > 0);
    }

    public function testMySpace() {
        // This space should not be accessible to anonymous users
        $this->client->request('GET', '/user/myspace');
        $this->assertFalse($this->client->getResponse()->isSuccessful());

        // So login and retry
        $this->doLogin('mich', 'mich');
        $this->assertTrue($this->client->getContainer()->get('security.context')->isGranted('ROLE_USER'));

        $crawler = $this->client->request('GET', '/user/myspace');
        $resp = $this->client->getResponse();
        echo $resp->headers;
        echo "Status: " . $resp->getStatusCode();
        $this->assertTrue($resp->isSuccessful());

        # Check page contents
        $this->assertTrue($crawler->filter('#content:contains("votre espace personnel")')->count() > 0);
    }

}
