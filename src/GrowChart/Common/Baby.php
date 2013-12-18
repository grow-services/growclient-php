<?php

namespace GrowChart\Common;

class Baby
{

    public $growchartid;
    public $babydob;
    public $birthgestation;
    public $birthweight;
    public $birthheight;
    public $babygender;
    public $antenataliugrdetection;
    public $babyname;
    public $babynr;


    public function getSoapParams()
    {
        return array(
            'growchartid'            => $this->growchartid,
            'babydob'                => $this->babydob,
            'birthgestation'         => $this->birthgestation,
            'birthweight'            => $this->birthweight,
            'birthweight'            => $this->birthheight,
            'babygender'             => $this->babygender,
            'antenataliugrdetection' => $this->antenataliugrdetection,
            'babyname'               => $this->babyname,
            'babynr'                 => $this->babynr
        );
    }

    public function getGrowchartid()
    {
        return $this->growchartid;
    }

    public function getBabydob()
    {
        return $this->babydob;
    }

    public function getBirthgestation()
    {
        return $this->birthgestation;
    }

    public function getBirthweight()
    {
        return $this->birthweight;
    }

    public function getBabygender()
    {
        return $this->babygender;
    }

    public function getAntenataliugrdetection()
    {
        return $this->antenataliugrdetection;
    }

    public function setGrowchartid($growchartid)
    {
        $this->growchartid = $growchartid;
    }

    public function setBabydob($babydob)
    {
        $this->babydob = $babydob;
    }

    public function setBirthgestation($birthgestation)
    {
        $this->birthgestation = $birthgestation;
    }

    public function setBirthweight($birthweight)
    {
        $this->birthweight = $birthweight;
    }

    public function setBabygender($babygender)
    {
        $this->babygender = $babygender;
    }

    public function setAntenataliugrdetection($antenataliugrdetection)
    {
        $this->antenataliugrdetection = $antenataliugrdetection;
    }
    
    public function getBirthheight()
    {
        return $this->birthheight;
    }

    public function setBirthheight($birthheight)
    {
        $this->birthheight = $birthheight;
    }
    
    public function getBabyName()
    {
        return $this->babyname;
    }

    public function setBabyName($babyname)
    {
        $this->babyname = $babyname;
    }
    
    public function getBabynr()
    {
        return $this->babynr;
    }

    public function setBabynr($babynr)
    {
        $this->babynr = $babynr;
    }
}
