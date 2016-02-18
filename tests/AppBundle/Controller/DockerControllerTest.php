<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DockerControllerTest extends WebTestCase
{

    public function testListRunningDockerContainers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/docker/status/SSD-19');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('ID', $crawler->filter('table')->html());
        $this->assertContains('Status', $crawler->filter('table')->html());
        $this->assertContains('Port', $crawler->filter('table')->html());
    }
}