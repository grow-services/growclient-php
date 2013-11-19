<?php

namespace GrowChart\RestClient;

use GrowChart\Common\Pregnancy;

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
        $this->baseurl = $baseurl;
    }

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

    public function addMeasurement()
    {
        $data = array();
        $this->buildQuery(
            '/addmeasurement/',
            $this->generateToken($salt),
            $data
        );
        $url = $this->baseurl . '/addmeasurement/?licensekey=' . $this->userkey;
        $url .= '&token=' . sha1();
    }


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
        return curl_exec($curl);
    }
    
    public function getQueryUrl()
    {
        return $this->queryurl;
    }
}
