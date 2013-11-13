<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class registerPregnancyCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('rest:registerpregnancy')
            ->setDescription('Register a pregnancy')
            ->addArgument(
                'apikey',
                InputArgument::REQUIRED,
                'API Key'
            )
            ->addArgument(
                'apisecret',
                InputArgument::REQUIRED,
                'API Secret'
            )
            ->addArgument(
                'reference',
                InputArgument::REQUIRED,
                'Reference'
            )
            ->addArgument(
                'firstname',
                InputArgument::OPTIONAL,
                'Firstname'
            )
            ->addArgument(
                'lastname',
                InputArgument::OPTIONAL,
                'Lastname'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dbname = $input->getArgument('dbname');
        $format = $input->getArgument('format');
        $client = new GrowRestClient($apikey);


        
    }

}
