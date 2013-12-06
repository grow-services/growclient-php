<?php

namespace GrowChart\SoapClient;

use GrowChart\BaseClient;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;
use GrowChart\Common\ChartPdf;
use GrowChart\Common\Birth;

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
        $this->call('addMeasurement', $measurement->getSoapParams());
    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        $obj = $this->call('getChartImage', $chart->getSoapParams());
        return $obj->url;
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

    public function getData($growchartid)
    {
        return $this->call('getData', array('growchartid' => $growchartid));
    }

    public function getPDF(ChartPdf $chartpdf)
    {
        $obj = $this->call('getPdf', $chartpdf->getSoapParams());
        return $obj->url;
    }

    public function registerBirth(Birth $bith)
    {
        return $this->call('registerBirth', $bith->getSoapParams());
        
    }
}
