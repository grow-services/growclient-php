<?php

namespace GrowChart;

/**
 * @author Cong Peijun <p.cong@linkorb.com>
 */
abstract class BaseClient implements ClientInterface
{
    protected $userkey;
    protected $usersecret;
    protected $isError = false;
    protected $errorCode;
    protected $errorMessage;

    /**
     * Generate the token string.
     * @param string $salt
     * @return string
     */
    public function generateToken($salt = '')
    {
        return sha1($this->userkey . $this->usersecret . $salt);
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
}
