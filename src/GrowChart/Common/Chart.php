<?php

namespace GrowChart\Common;

use InvalidArgumentException;

class Chart
{
    private $width = 750;
    private $height = 450;
    private $format = 'png';
    private $language = 'en_US';
    private $growchartid;
    
    private static $supportedLanguage = array('en_US', 'zh_CN', 'nl_NL');


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
}