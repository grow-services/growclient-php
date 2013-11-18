<?php

namespace GrowChart\RestClient;

use GrowChart\Common;

class Client
{
    private $baseurl = "http://localhost.api/";
    private $userkey = null;
    private $usersecret = null;

    public function __construct($userkey, $usersecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
    }

    public function setBaseUrl($baseurl)
    {
        $this->baseurl = $baseurl;
    }

    public function registerPregnancy(Pregnancy $pregnancy)
    {

        $data = array();
        $data['reference'] = $pregnancy->getReference();
        $data['firstname'] = $pregnancy->getFirstname();
        $data['lastname'] = $pregnancy->getLastname();


        $url = $this->baseurl . '/registerpregnancy/?licensekey=' . $this->userkey;
        $url .= '&token=' . sha1($this->usersecret . $pregnancy->getReference());
        $url .= '&' . http_build_query($data);

        $res = $this->httpRequest($url);
        //TODO: verify success
        return $res;
    }

    public function addMeasurement()
    {
        $url = $this->baseurl . '/addmeasurement/?licensekey=' . $this->userkey;
        $url .= '&token=' . sha1();
    }

    public function getChartImage()
    {
        
    }

    private function httpRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }
}
