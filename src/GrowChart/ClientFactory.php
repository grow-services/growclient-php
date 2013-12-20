<?php

namespace GrowChart;

use RuntimeException;

/**
 * Client factroy
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class ClientFactory
{

    /**
     * Factory instance
     * @var ClientFactory 
     */
    private static $instance = null;
    
    private static $clients = array();

    private $clientTypes = array(
        'rest',
        'xml',
        'soap'
    );
    
    private function __construct()
    {
        
    }

    /**
     * Get ClientFactroy instance
     * 
     * @return ClientFactory
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ClientFactory();
        }

        return self::$instance;
    }

    /**
     * Get grow client.
     * 
     * @param string $clientType
     * @param string $apikey
     * @param string $apisecret
     * @return AbstractClient The grow client instance.
     * @throws RuntimeException
     */
    public function getClient($type, $apikey, $apikeysecret)
    {
        if (!in_array(strtolower($type), $this->clientTypes)) {
            throw new RuntimeException('The client type "' . $type . '" is not supported.');
        }
        
        if (!isset(self::$clients[$type])) {
            $className = 'GrowChart\\' . ucfirst(strtolower($type)) . 'Client\\Client';
            self::$clients[$type] = new $className($apikey, $apikeysecret);
        }
        return self::$clients[$type];
    }
}
