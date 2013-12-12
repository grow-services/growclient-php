<?php

namespace GrowChart\Command;

use GrowChart\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Exception;

/**
 * Get data demo.
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class GetDataCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:getdata')
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
            $data = $this->client->getData($growchartid);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
        }
        print_r(json_decode(json_encode($data)));
    }
}
