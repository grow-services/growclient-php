<?php

namespace GrowChart\Common;

class Birth
{

    public $growchartid;
    public $babydob;
    public $birthgestation;
    public $birthweight;
    public $birthheight;
    public $babygender;
    public $antenataliugrdetection;

    public function getSoapParams()
    {
        return array(
            'growchartid'            => $this->growchartid,
            'babydob'                => $this->babydob,
            'birthgestation'         => $this->birthgestation,
            'birthweight'            => $this->babygender,
            'antenataliugrdetection' => $this->antenataliugrdetection
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
}
