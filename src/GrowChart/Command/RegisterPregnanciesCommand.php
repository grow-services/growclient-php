<?php
/**
 * @author congpeijun
 */

namespace GrowChart\Command;

use GrowChart\ClientFactory;
use GrowChart\Command;
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
        $pregnancies = array($preg, $preg);
        $this->client->registerPregnancies($pregnancies);
    }
}