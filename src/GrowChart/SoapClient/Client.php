<?php

namespace GrowChart\SoapClient;

use GrowChart\BaseClient;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;

/**
 * GROW chart soap client.
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class Client extends BaseClient
{
    const HEADER_NS = 'https://www.grow-services.net/api/grow/soap/';
    private $wsdl = 'https://www.grow-services.net/api/grow/soap/?wsdl';
    private $client = null;


    public function call($function_name, $arguments)
    {
        try {
            $response = $this->client->__soapCall($function_name, $arguments);
            return $response;
        } catch (\Exception $ex) {
            $this->isError = true;
            $this->errorCode = $ex->getCode();
            $this->errorMessage = $ex->getMessage();
            throw new \RuntimeException($this->errorMessage, $this->errorCode);
        }
    }


    public function __construct($userkey, $usersecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
        
        $this->client = new \SoapClient($this->wsdl, array(
            'cache_wsdl'   => 0,
            'soap_version' => SOAP_1_2
        ));
        $authHeader = new \stdClass();
        $authHeader->licensekey = $this->userkey;
        $authHeader->token = $this->generateToken();
        $header = new \SoapHeader(self::HEADER_NS, 'authenticate', $authHeader);
        $this->client->__setSoapHeaders(array($header));
    }
    
    public function addMeasurement(Measurement $measurement)
    {
        $this->call(__FUNCTION__, $measurement->getSoapParams());
    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        $obj = $this->call(__FUNCTION__, $chart->getSoapParams());
        return $obj->url;
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

    /**
     * Get the growchartid.
     * @param \GrowChart\Common\Pregnancy $pregnancy
     * @return string
     */
    public function registerPregnancy(Pregnancy $pregnancy)
    {
        $obj = $this->call('registerPregnancy', $pregnancy->getSoapParams());
        return $obj->growchartid;
    }
}
