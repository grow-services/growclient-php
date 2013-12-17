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
    private $soapClient = null;

    public function call($function_name, $arguments)
    {
        if (!$this->soapClient) {
            $baseUrl = $this->getBaseUrl();
            $this->wsdl = $baseUrl . '/soap/?wsdl';
            $this->soapClient = new \SoapClient($this->wsdl, array(
                'cache_wsdl'   => 0,
                'soap_version' => SOAP_1_2,
                'trace'        => $this->debug
            ));

            $authHeader = new \stdClass();
            $authHeader->licensekey = $this->userkey;
            $authHeader->token = $this->generateToken();
            $header = new \SoapHeader($baseUrl, 'authenticate', $authHeader);
            $this->soapClient->__setSoapHeaders(array($header));
        }

        try {
            $response = $this->soapClient->__soapCall($function_name, $arguments);
            return $response;
        } catch (\Exception $ex) {
            $this->isError = true;
            $this->errorCode = $ex->getCode();
            $this->errorMessage = $ex->getMessage();
            $this->soapClient->__getLastRequest();
            throw new \RuntimeException($this->errorMessage, $this->errorCode);
        }
    }

    public function __construct($userkey, $usersecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
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

    public function getPDF(ChartPdf $chartpdf, $filename = null)
    {
        $obj = $this->call('getPdf', $chartpdf->getSoapParams());
        return $obj->url;
    }

    public function registerBirth(Birth $birth)
    {
        return $this->call('registerBirth', $birth->getSoapParams());
        
    }
}