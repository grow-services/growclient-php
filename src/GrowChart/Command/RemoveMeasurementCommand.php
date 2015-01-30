<?php

namespace GrowChart\Command;

use GrowChart\ClientFactory;
use GrowChart\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveMeasurementCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:removemeasurement')
            ->setDescription('Remove measurements')
            ->addArgument(
                'growchartid',
                InputArgument::REQUIRED,
                'GROW chart id'
            )->addArgument(
                'measurementuuid',
                InputArgument::REQUIRED,
                'Measurement uuid'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $growchartid = $input->getArgument('growchartid');
        $uuid = $input->getArgument('measurementuuid');

        $result = $this->client->removeMeasurement($growchartid, $uuid);

        $output->writeln($result);
    }
}
