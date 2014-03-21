<?php

namespace GrowChart\Common;

use InvalidArgumentException;

class Chart extends AbstractCommon
{
    public $firstname;
    public $lastname;
    public $maternaldob;
    public $width = 750;
    public $height = 450;
    public $format = 'png';
    public $language = 'en_Uk';
    public $growchartid;
    public $reference;
    public $displayp95line = false;
    public $gridlinebyweight = false;

    private static $supportedLanguage = array('en_UK', 'zh_CN', 'nl_NL');


    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getGrowchartid()
    {
        return $this->growchartid;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setGrowchartid($growchartid)
    {
        $this->growchartid = $growchartid;
    }
    
    public function setSize($size)
    {
        $data = explode('x', $size);
        if (count($data) !== 2) {
            throw new InvalidArgumentException('Chart size is invalid.');
        }
        $this->setWidth($data[0]);
        $this->setHeight($data[1]);
    }


    public static function getSupportedLanguage()
    {
        return self::$supportedLanguage;
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

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function toArray()
    {
        return array(
            'growchartid'      => $this->getGrowchartid(),
            'reference'        => $this->getReference(),
            'height'           => $this->getHeight(),
            'width'            => $this->getWidth(),
            'language'         => $this->getLanguage(),
            'firstname'        => $this->getFirstname(),
            'lastname'         => $this->getLanguage(),
            'maternaldob'      => $this->getMaternaldob(),
            'displayp95line'   => $this->displayp95line,
            'gridlinebyweight' => $this->gridlinebyweight
        );
    }
    
    public function displayP95Line()
    {
        $this->displayp95line = 'true';
    }
    
    public function hideP95Line()
    {
        $this->displayp95line = false;
    }
    
    public function gridLineByWeight()
    {
        $this->gridlinebyweight = 'true';
    }
}
