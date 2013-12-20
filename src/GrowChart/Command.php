<?php

namespace GrowChart;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class Command extends SymfonyCommand
{
    /**
     * Grow client
     * @var AbstractClient
     */
    protected $client;
    
    protected function configure()
    {
        $this->addArgument(
            'clienttype',
            InputArgument::REQUIRED,
            'GROW client type: <info>rest xml and soap</info>'
        )->addArgument(
            'apikey',
            InputArgument::REQUIRED,
            'API Key'
        )
        ->addArgument(
            'apisecret',
            InputArgument::REQUIRED,
            'API Secret'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientType =  $input->getArgument('clienttype');
        $apisecret = $input->getArgument('apisecret');
        $apikey = $input->getArgument('apikey');
        try {
            $this->client = ClientFactory::getInstance()->getClient($clientType, $apikey, $apisecret);
            // $this->client->setBaseUrl('http://linkorbapi.l.cn/api/grow');
        } catch (\Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        
    }
}
