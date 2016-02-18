<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DockerController extends Controller
{

    /**
     * @Route("/docker/status/{branch}")
     */
    public function statusAction($branch)
    {
        $dockerPs = [
            ['id' => 'aa421c1v6d8', 'status' => 'Stoped', 'port' => 8080],
            ['id' => 'aa421c1v6d1', 'status' => 'Running', 'port' => 8880],
            ['id' => 'aa421c1v6d2', 'status' => 'Running', 'port' => 8980],
            ['id' => 'aa421c1v6d4', 'status' => 'Running', 'port' => 8180],
        ];

        return $this->render('docker/status.twig', [
            'dockerPs' => $dockerPs,
            'branch' => $branch]
        );
    }
}