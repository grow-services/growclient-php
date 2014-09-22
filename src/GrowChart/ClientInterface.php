<?php

namespace GrowChart;

use GrowChart\Common\Baby;
use GrowChart\Common\Birth;
use GrowChart\Common\Chart;
use GrowChart\Common\ChartPdf;
use GrowChart\Common\Measurement;
use GrowChart\Common\Pregnancy;

/**
 * The grow client intreface.
 * 
 * @author Cong Peijun <p.cong@linkorb.com>
 */
interface ClientInterface
{
    public function registerPregnancy(Pregnancy $pregnancy);

    public function addMeasurement(Measurement $measurement);

    public function getChartImage(Chart $chart, $filename = null);

    public function registerBirth(Birth $birth);
    
    public function registerBaby(Baby $baby);

    public function getData($growchartid, $requestdate = null, $weight = null);

    public function getPDF(ChartPdf $chartpdf, $filename = null);
    
    public function clearData($growchartid);
    
    public function getPregnancy($growchartid);

    public function removeMeasurement($growchartid, $measurementuuid);

    public function updateMeasurement(Measurement $measurement);

    public function registerPregnancies($pregnancies);
}
