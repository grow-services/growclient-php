<?php

namespace GrowChart\RestClient;

use GrowChart\BaseClient;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;
use RuntimeException;

class Client extends BaseClient
{
    private $baseurl = "https://www.grow-services.net/api/grow";
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
     * @return string The grow chart id.
     */
    public function registerPregnancy(Pregnancy $pregnancy)
    {
        $token = $this->generateToken();
        $url = $this->buildQuery(
            '/rest/registerpregnancy/',
            $token,
            $pregnancy
        );
        $res = $this->doRequest($url);
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        return (string) $res->growchartid;
    }

    /**
     * Add measurement.
     * @param \GrowChart\Common\Measurement $measurement
     * @return string
     * @throws RuntimeException
     */
    public function addMeasurement(Measurement $measurement)
    {
        $url = $this->buildQuery(
            '/rest/addmeasurement/',
            $this->generateToken(),
            $measurement
        );
        $res = $this->doRequest($url);
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }

    /**
     * Get grow chart images.
     * @param \GrowChart\Common\Chart $chart
     * @param string $filename The image file name. if you want to get the image to local.
     * @return string The grow chart image url.
     */
    public function getChartImage(Chart $chart, $filename = null)
    {
        $url = $this->buildQuery(
            '/rest/getchartimage/',
            $this->generateToken(),
            $chart
        );
        
        $res = $this->doRequest($url);
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        $imageurl = (string) $res->url;
        if ($filename) {
            $content = $this->httpRequest($imageurl);
            file_put_contents($filename . '.' . $chart->getFormat(), $content);
        }
        return $imageurl;
    }


    /**
     * Build query url.
     * @param string $path
     * @param string $token
     * @param mixed $data
     * @return string $url
     */
    private function buildQuery($path, $token, $data)
    {
        $url = $this->baseurl . $path . '?licensekey=' . $this->userkey;
        $url .= '&token=' . $token;
        $url .= '&' . http_build_query($data);
        return $this->queryurl = $url;
    }

    /**
     * http request.
     * @param string $url
     * @return string
     */
    private function httpRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        return curl_exec($curl);
    }
    
    /**
     * get query url.
     * @return string
     */
    public function getQueryUrl()
    {
        return $this->queryurl;
    }
    
    public function verifyResponse($response)
    {
        if (($res = simplexml_load_string($response))) {
            if (isset($res->code)) {
                $this->errorCode = (string) $res->code;
                $this->errorMessage = (string) $res->message;
                $this->isError = true;
            }
            return $res;
        }
        $this->isError = true;
    }

    public function doRequest($url)
    {
        $response = $this->httpRequest($url);
        return $this->verifyResponse($response);
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
}
