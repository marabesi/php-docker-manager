<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GitController
{

    /**
     * @Route("/git")
     */
    public function indexAction()
    {
        return new Response(
            ''
        );
    }
}