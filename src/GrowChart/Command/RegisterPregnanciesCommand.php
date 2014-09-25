<?php
/**
 * @author congpeijun
 */

namespace GrowChart\Command;

use GrowChart\ClientFactory;
use GrowChart\Command;
use GrowChart\Common\Baby;
use GrowChart\Common\Birth;
use GrowChart\Common\Chart;
use GrowChart\Common\Measurement;
use GrowChart\Common\Pregnancy;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RegisterPregnanciesCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:registerpregnancies')
            ->setDescription('Register pregnancies');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $preg = new Pregnancy();
        $preg->setEdd('20140809');
        $preg->setEthnicity(1);
        $preg->setParity(0);
        $preg->setMaternalheight(166);
        $preg->setMaternalweight(60);
        $preg->setGrowchartversion('NL2013');

        $measurement = new Measurement();
        $measurement->setDate('20140809');
        $measurement->setType('efw');
        $measurement->setValue(3000);
        $preg->setMeasurements(array($measurement, $measurement));

        $birth = new Birth();
        $birth->setAntenataliugrdetection(false);
        $birth->setBabydob('20140809');
        $preg->setBirth($birth);

        $chart = new Chart();
        $chart->setFirstname('Test');
        $chart->setHeight('750');
        $chart->setLanguage('en_US');

        $preg->setChart($chart);

        $baby = new Baby();
        $baby->setBabygender('M');
        $baby->setBabynr(1);
        $baby->setBabyName('Test baby');
        $babies = array($baby, $baby);

        $preg->setBabies($babies);

        $pregnancies = array($preg, $preg);
        $res = $this->client->registerPregnancies($pregnancies);
        print_r($res);
    }
}