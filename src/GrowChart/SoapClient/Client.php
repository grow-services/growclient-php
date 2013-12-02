<?php

namespace GrowChart\SoapClient;

use GrowChart\ClientInterface;
use SoapClient;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;

/**
 * GROW chart soap client.
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class Client extends SoapClient implements ClientInterface
{
    private $wsdl = 'http://linkorbapi.l.cn/api/grow/soap/?wsdl';
    private $client = null;
    
    
    public function __construct($apikey, $apisecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
    }
    
    public function getFunctions()
    {
        return $this->client->__getFunctions();
    }

    public function addMeasurement(Measurement $measurement)
    {
        
    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        
    }

    public function getData()
    {
        
    }

    public function getPDF()
    {
        
    }

    public function registerBirth()
    {
        
    }

    public function registerPregnancy(Pregnancy $pregnancy)
    {
        $arguments = json_decode(json_encode($pregnancy), true);
        $this->client->__soapCall(__FUNCTION__, $arguments);
        $res = $this->client->__getLastResponse();
        print_r($res);
    }
}
