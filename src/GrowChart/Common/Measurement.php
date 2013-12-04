<?php

namespace GrowChart\Common;

use InvalidArgumentException;

class Measurement
{
    public $growchartid;
    public $value;
    public $type;
    public $date;
    private static $measurementTypes = array('efw', 'fundalheight', 'birthweight');

    public function getGrowchartid()
    {
        return $this->growchartid;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setGrowchartid($growchartid)
    {
        $this->growchartid = $growchartid;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setType($type)
    {
        if (!in_array($type, self::$measurementTypes)) {
            throw new InvalidArgumentException('Wrong measurement type given.');
        }
        $this->type = $type;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public static function getMeasurementTypes()
    {
        return self::$measurementTypes;
    }
    
    public function getSoapParams()
    {
        return array(
            'growchartid' => $this->getGrowchartid(),
            'date'        => $this->getDate(),
            'type'        => $this->getType(),
            'value'       => $this->getValue()
        );
    }
}
