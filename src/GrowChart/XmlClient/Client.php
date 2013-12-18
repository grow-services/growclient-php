<?php

namespace GrowChart\XmlClient;

use GrowChart\BaseClient;
use GrowChart\Common\Baby;
use GrowChart\Common\Birth;
use GrowChart\Common\Chart;
use GrowChart\Common\ChartPdf;
use GrowChart\Common\Measurement;
use GrowChart\Common\Pregnancy;

/**
 * GROW chart api XML client
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class Client extends BaseClient
{
    public function addMeasurement(Measurement $measurement)
    {
        
    }

    public function getChartImage(Chart $chart, $filename = null)
    {
        
    }

    public function getPDF(ChartPdf $chartpdf, $filename = null)
    {
        
    }

    public function registerBirth(Birth $birth)
    {
        
    }

    public function registerPregnancy(Pregnancy $pregnancy)
    {
        
    }

    public function clearData($growchartid)
    {
        
    }

    public function getData($growchartid, $requestdate = null, $weight = null)
    {
        
    }

    public function registerBaby(Baby $baby)
    {
        
    }
}
