<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GitControllerTest extends WebTestCase
{

    public function testListAllBranches()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/git/branches');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Branch', $crawler->filter('table')->html());
    }
}