<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\Common\Measurement;
use GrowChart\RestClient\Client;

class AddMeasurementCommand extends Command
{

    protected function configure()
    {
        $this->setName('rest:addmeasurement')
            ->setDescription('Add measurements')
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
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $apikey = $input->getArgument('apikey');
        $apisecret = $input->getArgument('apisecret');
        $growchartid = $input->getArgument('growchartid');

        $dialog = $this->getHelperSet()->get('dialog');

        
        $measurementTypes= Measurement::getMeasurementTypes();
        $typeindex = $dialog->select(
            $output,
            '<info>Please select the measurement type, default is 0:</info>',
            $measurementTypes,
            0
        );
        
        $type = $measurementTypes[$typeindex];
        
        $date = $dialog->ask(
            $output,
            '<info>Please entry the date (YYYYMMDD):</info>'
        );
        
        $value = $dialog->ask(
            $output,
            '<info>Please entry the value:</info>'
        );
        
        $measurement = new Measurement();
        $measurement->setType($type);
        $measurement->setDate($date);
        $measurement->setValue($value);
        $measurement->setGrowchartid($growchartid);
        
        $client = new Client($apikey, $apisecret);
        $client->setBaseUrl('http://linkorbapi.l.cn/api/grow/');
        $res = $client->addMeasurement($measurement);
        // echo $client->getQueryUrl();
        $output->writeln($res);
    }
}
