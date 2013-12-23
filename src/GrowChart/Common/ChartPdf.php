<?php

namespace GrowChart\Common;

class ChartPdf extends AbstractCommon
{
    public $growchartid;
    public $firstname;
    public $lastname;
    public $maternaldob;
    public $language = 'en_Uk';
    public $reference;
    public $babyname;
    public $babygender;
    public $babygestation;
    public $babybirthweight;
    
    public function toArray()
    {
        return array(
            'growchartid'       => $this->growchartid,
            'firstname'         => $this->firstname,
            'lastname'          => $this->lastname,
            'maternaldob'       => $this->maternaldob,
            'reference'         => $this->reference,
            'babyname'          => $this->babyname,
            'babygender'        => $this->babygender,
            'babygestation'     => $this->babygestation,
            'babybirthweight'   => $this->babybirthweight
        );
    }

    public function getGrowchartid()
    {
        return $this->growchartid;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getMaternaldob()
    {
        return $this->maternaldob;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getBabyname()
    {
        return $this->babyname;
    }

    public function getBabygender()
    {
        return $this->babygender;
    }

    public function getBabygestation()
    {
        return $this->babygestation;
    }

    public function getBabybirthweight()
    {
        return $this->babybirthweight;
    }

    public function setGrowchartid($growchartid)
    {
        $this->growchartid = $growchartid;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setMaternaldob($maternaldob)
    {
        $this->maternaldob = $maternaldob;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setBabyname($babyname)
    {
        $this->babyname = $babyname;
    }

    public function setBabygender($babygender)
    {
        $this->babygender = $babygender;
    }

    public function setBabygestation($babygestation)
    {
        $this->babygestation = $babygestation;
    }

    public function setBabybirthweight($babybirthweight)
    {
        $this->babybirthweight = $babybirthweight;
    }
}
