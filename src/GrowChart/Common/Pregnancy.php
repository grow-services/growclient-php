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

    /**
     * @var Birth
     */
    private $birth;

    /**
     * @var Baby[]
     */
    private $babies;

    /**
     * @var Measurement[]
     */
    private $measurements;


    protected $rootName = 'pregnancy';

    /**
     * @var Pregnancy
     */
    private $items;


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

    /**
     * @param \GrowChart\Common\Baby[] $babies
     */
    public function setBabies($babies)
    {
        $this->babies = $babies;
    }

    /**
     * @return \GrowChart\Common\Baby[]
     */
    public function getBabies()
    {
        return $this->babies;
    }

    /**
     * @param \GrowChart\Common\Birth $birth
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    }

    /**
     * @return \GrowChart\Common\Birth
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @param \GrowChart\Common\Measurement[] $measurements
     */
    public function setMeasurements($measurements)
    {
        $this->measurements = $measurements;
    }

    /**
     * @return \GrowChart\Common\Measurement[]
     */
    public function getMeasurements()
    {
        return $this->measurements;
    }

    /**
     * @param \GrowChart\Common\Pregnancy $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return \GrowChart\Common\Pregnancy
     */
    public function getItems()
    {
        if (!$this->items) {
            $this->items[] = $this;
        }
        return $this->items;
    }

    /**
     * @param \GrowChart\Common\Pregnancy $item
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function toArray()
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

        $growchartid = $this->getGrowchartid();
        if ($this->birth) {
            $this->birth->setGrowchartid($growchartid);
            $params['birth'] = $this->birth->toArray();
        }

        if ($this->babies) {
            foreach ($this->babies as $baby) {
                $baby->setGrowchartid($growchartid);
                $params['babies'][] = $baby->toArray();
            }
        }

        if ($this->measurements) {
            foreach ($this->measurements as $m) {
                $m->setGrowchartid($growchartid);
                $params['measurements'][] = $m->toArray();
            }
        }

        return $params;
    }

    public function toJson()
    {
        $items = array();
        foreach ($this->getItems() as $item) {
            $items[] = $item->toArray();
        }
        return json_encode($items);
    }
}
