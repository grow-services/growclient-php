<?php

namespace GrowChart;

use GrowChart\Common\Pregnancy;
use GrowChart\Common\Measurement;
use GrowChart\Common\Chart;

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

    public function registerBirth();

    public function getData();

    public function getPDF();
}
