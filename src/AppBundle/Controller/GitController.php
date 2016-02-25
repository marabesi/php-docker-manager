<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class GitController extends Controller
{

    /**
     * @Route("/")
     */
    public function branchesAction()
    {
        $kernel = $this->get('kernel');

        $applicatoin = new Application($kernel);
        $applicatoin->setAutoExit(false);

        $git = new ArrayInput([
            'command' => 'git:branch'
        ]);

        $output = new BufferedOutput();
        $applicatoin->run($git, $output);

        $content = $output->fetch();

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