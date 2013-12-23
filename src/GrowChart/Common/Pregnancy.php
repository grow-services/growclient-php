<?php

namespace GrowChart\Common;

use DOMDocument;

class Pregnancy extends AbstractCommon
{

    public $growchartid;
    public $maternalheight;
    public $maternalweight;
    public $growchartversion;
    public $edd;
    public $parity = 0;
    public $ethnicity;
    public $requestdate = null;
    
    protected $rootName = 'pregnancy';


    public function getGrowchartid()
    {
        return $this->growchartid;
    }

    public function getMaternalheight()
    {
        return $this->maternalheight;
    }

    public function getMaternalweight()
    {
        return $this->maternalweight;
    }

    public function getGrowchartversion()
    {
        return $this->growchartversion;
    }

    public function getEdd()
    {
        return $this->edd;
    }

    public function getParity()
    {
        return $this->parity;
    }

    public function getEthnicity()
    {
        return $this->ethnicity;
    }

    public function getRequestdate()
    {
        return $this->requestdate;
    }

    public function setGrowchartid($growchartid)
    {
        $this->growchartid = $growchartid;
    }

    public function setMaternalheight($maternalheight)
    {
        $this->maternalheight = $maternalheight;
    }

    public function setMaternalweight($maternalweight)
    {
        $this->maternalweight = $maternalweight;
    }

    public function setGrowchartversion($growchartversion)
    {
        $this->growchartversion = $growchartversion;
    }

    public function setEdd($edd)
    {
        $this->edd = $edd;
    }

    public function setParity($parity)
    {
        $this->parity = $parity;
    }

    public function setEthnicity($ethnicity)
    {
        $this->ethnicity = $ethnicity;
    }

    public function setRequestdate($requestdate)
    {
        $this->requestdate = $requestdate;
    }

    protected function toArray()
    {
        $params = array();
        $params['maternalheight'] = $this->getMaternalheight();
        $params['maternalweight'] = $this->getMaternalweight();
        $params['ethnicity'] = $this->getEthnicity();
        $params['parity'] = $this->getParity();
        $params['edd'] = $this->getEdd();
        $params['growversion'] = $this->getGrowchartversion();
        $params['growchartid'] = $this->getGrowchartid();
        $params['requestdate'] = $this->getRequestdate();
        return $params;
    }
}
