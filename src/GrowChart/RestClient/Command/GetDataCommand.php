<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\RestClient\Client;
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
        $this->setName('rest:getdata')
            ->setDescription('Get data centile')
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
        
        $client = new Client($apikey, $apisecret);

        try {
            $data = $client->getData($growchartid);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
        }
        $output->writeln($data->asXML());
    }
}
