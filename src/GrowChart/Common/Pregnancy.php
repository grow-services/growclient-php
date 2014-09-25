<?php

namespace GrowChart\Common;

use SoapParam;
use SoapVar;

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
    public $growversion;

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
     * @var Pregnancy[]
     */
    private $items;

    /**
     * @var Chart
     */
    private $chart;

    /**
     * @var Baby[]
     */
    private $previousbabies;


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
        $this->growchartversion = $this->growversion = $growchartversion;

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
        $this->babies = $this->previousbabies = $babies;
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
     * @param \GrowChart\Common\Pregnancy[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return \GrowChart\Common\Pregnancy[]
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

    /**
     * @param \GrowChart\Common\Chart $chart
     */
    public function setChart($chart)
    {
        $this->chart = $chart;
    }

    /**
     * @return \GrowChart\Common\Chart
     */
    public function getChart()
    {
        return $this->chart;
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

        if ($this->chart) {
            $this->chart->setGrowchartid($growchartid);
            $params['chart'] = $this->chart->toArray();
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


    /**
     * Convert Pregnancy to xml tree.
     *
     * @param \DOMElement $dom
     */
    public function toXml(\DOMElement $dom)
    {
        $pregnancyNode = new \DOMElement('pregnancy');
        $dom->appendChild($pregnancyNode);

        foreach ($this->toArray() as $k => $v) {
            if (!is_array($v)) {
                $v && $pregnancyNode->appendChild(new \DOMElement($k, $v));
            } else {
                $subNode = new \DOMElement($k);
                $pregnancyNode->appendChild($subNode);
                foreach ($v as $subk => $subv) {
                    if (is_array($subv)) {
                        $itemNodeName = $k === 'babies' ? 'baby' : 'meansurement';
                        $itemNode = new \DOMElement($itemNodeName);
                        $subNode->appendChild($itemNode);
                        foreach ($subv as $key => $value) {
                            $value && $itemNode->appendChild(new \DOMElement($key, $value));
                        }
                    } else {
                        $subv && $subNode->appendChild(new \DOMElement($subk, $subv));
                    }
                }
            }
        }

    }

    public function toSoapParam()
    {
        return new SoapParam(
            new SoapVar(
                $this->getItems(),
                SOAP_USE_XSI_ARRAY_TYPE,
                "pregnancies",
                "http://www.w3.org/2001/XMLSchema"
            ),
            "pregnancies"
        );
    }
}
