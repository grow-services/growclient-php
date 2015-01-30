<?php

namespace GrowChart\Command;

use GrowChart\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\Common\Measurement;
use Exception;

class UpdateMeasurementCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:updatemeasurement')
            ->setDescription('Update measurements')
            ->addArgument(
                'growchartid',
                InputArgument::REQUIRED,
                'GROW chart id'
            )->addArgument(
                'measurementuuid',
                InputArgument::REQUIRED,
                'Measurement uuid'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $growchartid = $input->getArgument('growchartid');
        $uuid = $input->getArgument('measurementuuid');
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
        $measurement->setUuid($uuid);
        try {
            $res = $this->client->updateMeasurement($measurement);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        $output->writeln($res);
    }
}
