<?php

namespace GrowChart\RestClient;

use GrowChart\BaseClient;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;
use GrowChart\Common\Birth;
use GrowChart\Common\ChartPdf;
use RuntimeException;

class Client extends BaseClient
{
    public function __construct($userkey, $usersecret)
    {
        $this->userkey = $userkey;
        $this->usersecret = $usersecret;
    }

    /**
     * Register pregnancy.
     * @param \GrowChart\Common\Pregnancy $pregnancy
     * @return string The grow chart id.
     */
    public function registerPregnancy(Pregnancy $pregnancy)
    {
        $token = $this->generateToken();
        $url = $this->buildQuery(
            '/rest/registerpregnancy/',
            $token,
            $pregnancy
        );
        $res = $this->doRequest($url);
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        
        return (string) $res->growchartid;
    }

    /**
     * Add measurement.
     * @param \GrowChart\Common\Measurement $measurement
     * @return \SimpleXMLElement
     * @throws RuntimeException
     */
    public function addMeasurement(Measurement $measurement)
    {
        $url = $this->buildQuery(
            '/rest/addmeasurement/',
            $this->generateToken(),
            $measurement
        );
        $res = $this->doRequest($url);
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }

    /**
     * Get grow chart images.
     * @param \GrowChart\Common\Chart $chart
     * @param string $filename The image file name. if you want to get the image to local.
     * @return string The grow chart image url.
     */
    public function getChartImage(Chart $chart, $filename = null)
    {
        $url = $this->buildQuery(
            '/rest/getchartimage/',
            $this->generateToken(),
            $chart
        );
        
        $res = $this->doRequest($url);
        
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

    /**
     * Get the grow chart data.
     * @param string $growchartid
     * @return \SimpleXMLElement
     * @throws RuntimeException
     */
    public function getData($growchartid)
    {
        $url = $this->buildQuery(
            '/rest/getdata/',
            $this->generateToken(),
            array('growchartid' => $growchartid)
        );
        
        $res = $this->doRequest($url);
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }

    /**
     * Get GROW pdf.
     * @param \GrowChart\Common\ChartPdf $chartpdf
     * @param string $filename If the file name is set, you can get a pdf file with given name.
     * @return \SimpleXMLElement
     * @throws RuntimeException
     */
    public function getPDF(ChartPdf $chartpdf, $filename = null)
    {
        $url = $this->buildQuery(
            '/rest/getpdf/',
            $this->generateToken(),
            $chartpdf
        );
        
        $res = $this->doRequest($url);
        
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

    /**
     * Register birth.
     * @param \GrowChart\Common\Birth $birth
     * @return \SimpleXMLElement
     * @throws RuntimeException
     */
    public function registerBirth(Birth $birth)
    {
        $url = $this->buildQuery(
            '/rest/registerbirth/',
            $this->generateToken(),
            $birth
        );
        
        $res = $this->doRequest($url);
        
        if ($this->isError) {
            throw new RuntimeException($this->errorMessage, $this->errorCode);
        }
        return $res;
    }
}
