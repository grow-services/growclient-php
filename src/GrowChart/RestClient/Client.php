<?php

namespace GrowChart\RestClient;

use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;

class Client
{
    private $baseurl = "http://localhost.api/";
    private $userkey = null;
    private $usersecret = null;
    private $queryurl = '';

    public function __construct($userkey, $usersecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
    }

    public function setBaseUrl($baseurl)
    {
        $this->baseurl = rtrim($baseurl, '/');
    }

    /**
     * Register pregnancy.
     * @param \GrowChart\Common\Pregnancy $pregnancy
     * @return string
     */
    public function registerPregnancy(Pregnancy $pregnancy)
    {

        $data = array();
        $data['reference'] = $pregnancy->getReference();
        $data['firstname'] = $pregnancy->getFirstname();
        $data['lastname'] = $pregnancy->getLastname();
        $data['reference'] = $pregnancy->getReference();
        $data['firstname'] = $pregnancy->getFirstname();
        $data['lastname'] = $pregnancy->getLastname();
        $data['maternaldob'] = $pregnancy->getMaternaldob();
        $data['maternalheight'] = $pregnancy->getMaternalheight() ;
        $data['maternalweight'] = $pregnancy->getMaternalweight();
        $data['growversion'] = $pregnancy->getGrowversion();
        $data['edd'] = $pregnancy->getEdd();
        $data['parity'] = $pregnancy->getParity();
        $data['ethnicity'] = $pregnancy->getEthnicity();

        $token = $this->generateToken($pregnancy->getReference());
        $url = $this->buildQuery('/registerpregnancy/', $token, $data);
        $res = $this->httpRequest($url);
        //TODO: verify success
        return $res;
    }

    /**
     * Add measurement.
     * @param \GrowChart\Common\Measurement $measurement
     * @return string
     */
    public function addMeasurement(Measurement $measurement)
    {
        $data = array();
        $data['date'] = $measurement->getDate();
        $data['value'] = $measurement->getValue();
        $data['type'] = $measurement->getType();
        $data['growchartid'] = $measurement->getGrowchartid();
        
        $url = $this->buildQuery(
            '/addmeasurement/',
            $this->generateToken($data['growchartid']),
            $data
        );
        $res = $this->httpRequest($url);
        return $res;
    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        $data = array();
        $data['growchartid'] = $chart->getGrowchartid();
        $data['language'] = $chart->getLanguage();
        $data['width'] = $chart->getWidth();
        $data['height'] = $chart->getHeight();
        $data['format'] = $chart->getFormat();
        $url = $this->buildQuery(
            '/getchartimage/',
            $this->generateToken($data['growchartid']),
            $data
        );
        if ($filename) {
            $content = $this->httpRequest($url);
            file_put_contents($filename . '.' . $chart->getFormat(), $content);
        }
        return $this->queryurl;
    }

    /**
     * Generate the token string.
     * @param string $salt
     * @return string
     */
    public function generateToken($salt)
    {
        return sha1($this->usersecret . $salt);
    }

        /**
     * Build query url.
     * @param string $path
     * @param string $token
     * @param array $data
     * @return string $url
     */
    private function buildQuery($path, $token, $data = array())
    {
        $url = $this->baseurl . $path . '?licensekey=' . $this->userkey;
        $url .= '&token=' . $token;
        $url .= '&' . http_build_query($data);
        return $this->queryurl = $url;
    }


    private function httpRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        return curl_exec($curl);
    }
    
    public function getQueryUrl()
    {
        return $this->queryurl;
    }
}
