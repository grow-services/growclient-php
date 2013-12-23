<?php

namespace GrowChart\XmlClient;

use GrowChart\AbstractClient;
use GrowChart\Common\Baby;
use GrowChart\Common\Birth;
use GrowChart\Common\Chart;
use GrowChart\Common\ChartPdf;
use GrowChart\Common\Measurement;
use GrowChart\Common\Pregnancy;
use RuntimeException;

/**
 * GROW chart api XML client
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class Client extends AbstractClient
{

    public function addMeasurement(Measurement $measurement)
    {
        $res = $this->doRequest(
            $this->buildQuery('/xml/addmeasurement/'),
            $measurement->getXmlPayload()
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        return $res;
    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        $res = $this->doRequest(
            $this->buildQuery('/xml/getchartimage/'),
            $chart->getXmlPayload()
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        $imageurl = (string) $res->url;
        if ($filename) {
            $content = $this->httpRequest($imageurl);
            file_put_contents($filename . '.' . $chart->getFormat(), $content);
        }
        return $imageurl;
    }

    public function getPDF(ChartPdf $chartpdf, $filename = null)
    {
        $res = $this->doRequest(
            $this->buildQuery('/xml/getpdf/'),
            $chartpdf->getXmlPayload()
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        $pdfurl = (string) $res->url;
        if ($filename) {
            $content = $this->httpRequest($pdfurl);
            file_put_contents($filename, $content);
        }
        return $pdfurl;
    }

    public function registerBirth(Birth $birth)
    {
        $res = $this->doRequest(
            $this->buildQuery('/xml/registerbirth/'),
            $birth->getXmlPayload()
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        return $res;
    }

    public function registerPregnancy(Pregnancy $pregnancy)
    {
        $res = $this->doRequest(
            $this->buildQuery('/xml/registerpregnancy/'),
            $pregnancy->getXmlPayload()
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return (string) $res->growchartid;
    }

    public function clearData($growchartid)
    {
        $res = $this->doRequest(
            $this->buildQuery(
                '/xml/cleardata/',
                array('growchartid' => $growchartid)
            )
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }

    public function getData($growchartid, $requestdate = null, $weight = null)
    {
        $res = $this->doRequest(
            $this->buildQuery(
                '/xml/getdata/',
                array(
                    'growchartid' => $growchartid,
                    'requestdate' => $requestdate,
                    'weight'      => $weight
                )
            )
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }

    public function registerBaby(Baby $baby)
    {
        $res = $this->doRequest(
            $this->buildQuery(
                '/xml/registerbaby/'
            ),
            $baby->getXmlPayload()
        );
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }
}
