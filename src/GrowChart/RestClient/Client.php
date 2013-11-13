<?php

namespace GrowChart\RestClient;

use GrowChart\Common;

class Client
{
    private $baseurl = "http://localhost.api/";

    public function __construct($userkey, $usersecret)
    {

    }
    public function setBaseUrl($baseurl) {
        $this->baseurl = $baseurl;
    }
 
    public function registerPregnancy(Pregnancy $pregnancy)
    {
        
        $data = array();
        $data['reference'] = sha1($this->userkey . $pregnancy->getReference());
        $data['firstname'] = sha1($this->userkey . $pregnancy->getFirstname());
        $data['lastname'] = sha1($this->userkey . $pregnancy->getLastname());


        $url = $this->baseurl . '/registerpregnancy/?userkey=' . $this->userkey;
        $url .= '&token=' . sha1($this->userkey . $pregnancy->getReference());
        $url .= '&' . http_build_query($url);

        $res = $this->httpRequest($url);
        //TODO: verify success
        return $res;
 
    }

    private function httpRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }


}