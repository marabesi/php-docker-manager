<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Request;

class GitController extends Controller
{

    /**
     * @Route("/")
     */
    public function branchesAction(Request $request)
    {
        $request = $request->createFromGlobals();
        $branches = [];
        $repo = null;

        if ($request->isMethod('post')) {
            $repo = $request->get('repository');

            $kernel = $this->get('kernel');

            $applicatoin = new Application($kernel);
            $applicatoin->setAutoExit(false);

            $git = new ArrayInput([
                'command' => 'git:branch',
                'repository' => $repo
            ]);

            $output = new BufferedOutput();
            $applicatoin->run($git, $output);

            $content = $output->fetch();

            $service = $this->get('git.branch');
            $branches = $service->find($content);

            $request->cookies->set('repository', $repo);
        }

        return $this->render('git/branches.twig', [
            'branches' => $branches
        ]);
    }
}