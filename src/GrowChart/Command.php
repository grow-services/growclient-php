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
    protected $client;
    
    private $clientTypes = array(
        'rest',
        'xml',
        'soap'
    );

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
            $this->client = $this->getClientInstance($clientType, $apikey, $apisecret);
        } catch (\Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        
    }
    
    /**
     * Get grow client.
     * @param string $clientType
     * @param string $apikey
     * @param string $apisecret
     * @return The grow client instance.
     */
    protected function getClientInstance($clientType, $apikey, $apisecret)
    {
        if (!in_array(strtolower($clientType), $this->clientTypes)) {
            throw new \RuntimeException('The client type "'. $clientType .'" is not supported.');
        }
        $className = 'GrowChart\\' . ucfirst(strtolower($clientType)) . 'Client\\Client';
        return new $className($apikey, $apisecret);
    }
}
