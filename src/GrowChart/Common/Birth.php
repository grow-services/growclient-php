<?php

namespace GrowChart\Common;

class Birth extends AbstractCommon
{
    public $growchartid;
    public $babydob;
    public $birthweight;
    public $babygender;
    public $antenataliugrdetection;

    public function toArray()
    {
        return array(
            'growchartid'            => $this->growchartid,
            'babydob'                => $this->babydob,
            'birthweight'            => $this->birthweight,
            'babygender'             => $this->babygender,
            'antenataliugrdetection' => $this->antenataliugrdetection,
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
}
