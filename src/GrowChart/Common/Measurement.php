<?php

namespace GrowChart\Common;

use DOMDocument;
use InvalidArgumentException;

class Measurement extends AbstractCommon
{

    public $growchartid;
    public $value;
    public $type;
    public $date;
    private static $measurementTypes = array('efw', 'fundalheight', 'birthweight');

    /**
     * @var Measurement[]
     */
    public static $measurements = array();

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

    protected function toArray()
    {
        return array(
            'growchartid' => $this->getGrowchartid(),
            'date'        => $this->getDate(),
            'type'        => $this->getType(),
            'value'       => $this->getValue()
        );
    }

    public static function addMesurements($measurement)
    {
        self::$measurements[] = $measurement;
    }


    public function getXmlPayload()
    {
        if (!self::$measurements) {
            self::$measurements = array($this);
        }
        
        $xml = new DOMDocument();
        $xml->encoding = 'utf-8';

        $root = $xml->createElement('measurements');
        $root->setAttribute('growchartid', $this->growchartid);
        foreach (self::$measurements as $measurement) {
            $measurementNode = $xml->createElement('measurement');

            foreach ($measurement->toArray() as $k => $v) {
                $mNode = $xml->createElement($k, $v);
                $measurementNode->appendChild($mNode);
            }

            $root->appendChild($measurementNode);
        }
        $xml->appendChild($root);
        $xml->formatOutput = true;
        return $xml->saveXML();
    }
}
