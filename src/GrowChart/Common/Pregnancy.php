<?php

namespace GrowChart\Common;

class Pregnancy
{
    public $reference;
    public $firstname;
    public $lastname;
    public $maternaldob;
    public $maternalheight;
    public $maternalweight;
    public $growversion;
    public $edd;
    public $parity = 0;
    public $ethnicity;

    public function getReference()
    {
        return $this->reference;
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

    public function getMaternalheight()
    {
        return $this->maternalheight;
    }

    public function getMaternalweight()
    {
        return $this->maternalweight;
    }

    public function getGrowversion()
    {
        return $this->growversion;
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

    public function setReference($reference)
    {
        $this->reference = $reference;
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

    public function setMaternalheight($maternalheight)
    {
        $this->maternalheight = $maternalheight;
    }

    public function setMaternalweight($maternalweight)
    {
        $this->maternalweight = $maternalweight;
    }

    public function setGrowversion($growversion)
    {
        $this->growversion = $growversion;
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
}
