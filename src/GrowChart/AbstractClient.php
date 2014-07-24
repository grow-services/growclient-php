<?php

namespace GrowChart;

use RuntimeException;

/**
 * @author Cong Peijun <p.cong@linkorb.com>
 */
abstract class AbstractClient implements ClientInterface
{
    protected $userkey;
    protected $usersecret;
    protected $isError = false;
    protected $errorCode;
    protected $errorMessage;
    protected $baseurl = "https://www.grow-services.net/api/grow";
    protected $queryurl = '';
    protected $debug = false;


    public function __construct($userkey, $usersecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
    }
    
    /**
     * Set api server url.
     * @param type $baseurl
     */
    public function setBaseUrl($baseurl)
    {
        $this->baseurl = rtrim($baseurl, '/');
    }
    
    protected function getBaseUrl()
    {
        return rtrim($this->baseurl);
    }

    protected function setUserKey($userkey)
    {
        $this->userkey = $userkey;
    }
    
    protected function setUserSecret($secret)
    {
        $this->usersecret = $secret;
    }

        /**
     * Generate the token string.
     * @param string $salt
     * @return string
     */
    public function generateToken($salt = '')
    {
        return sha1($this->userkey . $this->usersecret . $salt);
    }

    /**
     * Build query url.
     * @param string $path
     * @param mixed $data
     * @return string $url
     */
    protected function buildQuery($path, $data = null)
    {
        $url = rtrim($this->baseurl, '/') . $path . '?licensekey=' . $this->userkey;
        $url .= '&token=' . $this->generateToken();

        if ($data) {
            $url .= '&' . http_build_query($data);
        }
        return $this->queryurl = $url;
    }

    /**
     * http request.
     * @param string $url
     * @param string $payload
     * @param string $method
     * @return string
     */
    protected function httpRequest($url, $payload = null, $method = 'GET')
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        if (!is_null($payload)) {
            $method = 'post';
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        }

        switch (strtolower($method)) {
            case 'post':
                curl_setopt($curl, CURLOPT_POST, 1);
                break;
            case 'put':
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
        }
        $response = curl_exec($curl);
        if (($error = curl_error($curl))) {
            $this->isError = true;
            $this->errorMessage = $error;
            throw new RuntimeException($error);
        }
        curl_close($curl);
        return $response;
    }

    /**
     * Get the query url.
     * get query url.
     * @return string
     */
    public function getQueryUrl()
    {
        return $this->queryurl;
    }

    /**
     * Verify the request response.
     * @param string $response
     * @return \SimpleXMLElement
     */
    public function verifyResponse($response)
    {
        if (($res = simplexml_load_string($response))) {
            if (isset($res->code)) {
                $this->errorCode = (string) $res->code;
                $this->errorMessage = (string) $res->message;
                $this->isError = true;
                throw new RuntimeException($this->errorMessage, $this->errorCode);
            }
            return $res;
        }
        $this->isError = true;
    }
    
    /**
     * Start request
     *
     * @param string $url
     * @param string $payload
     * @param string $method
     * @return mixed
     */
    protected function doRequest($url, $payload = null, $method = 'GET')
    {
        $response = $this->httpRequest($url, $payload, $method);
        return $this->verifyResponse($response);
    }

    public function isError()
    {
        return $this->isError;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    
    public function debug()
    {
        $this->debug = true;
    }
}
