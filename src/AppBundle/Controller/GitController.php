<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GitController extends Controller
{

    /**
     * @Route("/")
     */
    public function branchesAction()
    {
        $branches = [
            'SSD-19',
            'SSD-20',
            'SSD-40',
            'SSD-51',
            'HD-88891',
            'HD-88892',
            'HD-88893',
        ];

        return $this->render('git/branches.twig', [
            'branches' => $branches
        ]);
    }
}