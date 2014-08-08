<?php

/**
 * @author Cong Peijun <p.cong@linkorb.com>
 */

namespace GrowChart\JsonClient;

use GrowChart\AbstractClient;
use GrowChart\Common\Baby;
use GrowChart\Common\Birth;
use GrowChart\Common\Chart;
use GrowChart\Common\ChartPdf;
use GrowChart\Common\Measurement;
use GrowChart\Common\Pregnancy;

class Client extends AbstractClient
{
    public function verifyResponse($response)
    {
        if (($res = json_decode($response))) {
            if (isset($res->code)) {
                $this->errorCode = (string)$res->code;
                $this->errorMessage = (string)$res->message;
                $this->isError = true;

                throw new \RuntimeException($this->errorMessage, $this->errorCode);
            }
            return $res;
        }
        $this->isError = true;
    }

    public function registerPregnancy(Pregnancy $pregnancy)
    {
        $url = $this->buildQuery('/v2/pregnancy/');
        $res = $this->doRequest($url, $pregnancy->toJson(), 'POST');

        return $res;
    }

    public function addMeasurement(Measurement $measurement)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/measurements', $measurement->getGrowchartid())
        );

        return $this->doRequest($url, $measurement->toJson());

    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/chartimage', $chart->getGrowchartid())
        );

        $res = $this->doRequest($url, $chart->toJson());
        $imageurl = (string) $res->url;
        if ($filename) {
            $content = $this->httpRequest($imageurl);
            file_put_contents($filename . '.' . $chart->getFormat(), $content);
        }
        return $imageurl;
    }

    public function registerBirth(Birth $birth)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/birth', $birth->getGrowchartid())
        );

        $res = $this->doRequest($url, $birth->toJson());
        return $res;
    }

    public function registerBaby(Baby $baby)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/baby', $baby->getGrowchartid())
        );

        return $this->doRequest($url, $baby->toJson());
    }

    public function getData($growchartid, $requestdate = null, $weight = null)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/actions/getdata', $growchartid),
            array(
                'requestdate' => $requestdate,
                'birthweight' => $weight
            )
        );

        return $this->doRequest($url);
    }

    public function getPDF(ChartPdf $chartpdf, $filename = null)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/chartpdf', $chartpdf->getGrowchartid())
        );
        $res = $this->doRequest($url, $chartpdf->toJson());
        $pdfurl = (string) $res->url;
        if ($filename) {
            $content = $this->httpRequest($pdfurl);
            file_put_contents($filename, $content);
        }
        return $pdfurl;
    }

    public function clearData($growchartid)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/actions/cleardata', $growchartid)
        );
        return $this->doRequest($url);
    }

    public function getPregnancy($growchartid)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s', $growchartid)
        );
        return $res = $this->doRequest($url);
    }

    public function removeMeasurement($growchartid, $measurementuuid)
    {
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/measurement/%s', $growchartid, $measurementuuid)
        );
        return $this->doRequest($url, null, 'DELETE');
    }

    public function updateMeasurement(Measurement $measurement)
    {
        $growchartid = $measurement->getGrowchartid();
        $measurementuuid = $measurement->getUuid();
        $url = $this->buildQuery(
            sprintf('/v2/pregnancy/%s/measurement/%s', $growchartid, $measurementuuid)
        );

        return $this->doRequest($url, $measurement->toJson(), 'PUT');
    }
}