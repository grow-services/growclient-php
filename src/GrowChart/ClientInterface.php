<?php

namespace GrowChart;

use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;
use GrowChart\Common\ChartPdf;
use GrowChart\Common\Birth;

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

    public function getData($growchartid);

    public function getPDF(ChartPdf $chartpdf, $filename = null);
}
