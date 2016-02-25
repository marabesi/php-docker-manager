<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GitCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('git:branches')
            ->setDescription('List all branches from a repository')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $git = shell_exec('git branch -a');

        return $output->writeln($git);
    }
}