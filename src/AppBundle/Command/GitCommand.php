<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GitCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('git:branches')
            ->setDescription('List all branches from a repository')
            ->addArgument('repository',
                InputArgument::REQUIRED,
                'Let me know which repository you would like to list')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $input->getArgument('repository');

        $git = shell_exec(
            sprintf('git ls-remote --heads %s', $repository)
        );

        return $output->writeln($git);
    }
}