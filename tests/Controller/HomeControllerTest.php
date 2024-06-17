<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'InstaBank');
    }

    public function testClickLink(): void
    {
        $this->expectNotToPerformAssertions();

        $client = static::createClient();
        $client->request('GET', '/');

        $client->clickLink('Inscription');
    }

    public function testHttpResponse()
    {
        $c = static::createClient();
        $c->request('GET','/');
        $this->assertResponseIsSuccessful();
    }

}
