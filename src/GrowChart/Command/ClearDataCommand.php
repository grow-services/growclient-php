<?php

namespace GrowChart\Command;

use Exception;
use GrowChart\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Clear data demo.
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class ClearDataCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:cleardata')
            ->setDescription('Get data centile')
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
        

        try {
            $data = $this->client->clearData($growchartid);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        print_r(json_decode(json_encode($data), true));
    }
}
