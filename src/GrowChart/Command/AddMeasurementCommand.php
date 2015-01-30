<?php

namespace GrowChart\Command;

use GrowChart\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\Common\Measurement;
use Exception;

class AddMeasurementCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:addmeasurement')
            ->setDescription('Add measurements')
            ->addArgument(
                'growchartid',
                InputArgument::REQUIRED,
                'GROW chart id'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
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
        try {
            $res = $this->client->addMeasurement($measurement);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        $output->writeln(json_encode($res));
    }
}
