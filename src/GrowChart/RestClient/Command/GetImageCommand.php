<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\Common\Chart;
use GrowChart\RestClient\Client;

class GetImageCommand extends Command
{

    protected function configure()
    {
        $this->setName('rest:getimage')
            ->setDescription('Get GROW image.')
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
                'growchartid',
                InputArgument::REQUIRED,
                'GROW chart id'
            )
            ->addArgument(
                'filename',
                InputArgument::OPTIONAL,
                'GROW chart file name to save.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $apikey = $input->getArgument('apikey');
        $apisecret = $input->getArgument('apisecret');
        $growchartid = $input->getArgument('growchartid');
        $filename = $input->getArgument('filename');
        
        $dialog = $this->getHelperSet()->get('dialog');
        $langs = Chart::getSupportedLanguage();
        
        $firstname = $dialog->ask(
            $output,
            '<info>Please enter the first name of mohter: </info>'
        );
        
        $lastname = $dialog->ask(
            $output,
            '<info>Please enter the last name of mohter: </info>'
        );
        
        $maternaldob = $dialog->ask($output, '<info>Please entry the maternal dob (YYYYMMDD):</info>');
        
        $languageIndex = $dialog->select(
            $output,
            '<info>Please entry the chart language default is 0:</info>',
            $langs,
            0
        );
         
        $language = $langs[$languageIndex];
        
        $size = $dialog->ask(
            $output,
            '<info>Please entry the chart size, default is 750x450 (weight x heigth):</info>',
            '750x450'
        );
        
        $chart = new Chart();
        $chart->setGrowchartid($growchartid);
        $chart->setLanguage($language);
        $chart->setSize($size);
        $chart->setFirstname($firstname);
        $chart->setLastname($lastname);
        $chart->setMaternaldob($maternaldob);
        
        $client = new Client($apikey, $apisecret);
        $client->setBaseUrl('http://linkorbapi.l.cn/api/grow/');
        $res = $client->getChartImage($chart, $filename);
        $output->writeln($res);
    }
}
