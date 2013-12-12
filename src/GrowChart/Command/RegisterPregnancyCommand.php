<?php

namespace GrowChart\Command;

use GrowChart\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Ethnicity;
use InvalidArgumentException;
use Exception;

class RegisterPregnancyCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('grow:registerpregnancy')
            ->setDescription('Register a pregnancy')
            ->addArgument(
                'growchartid',
                InputArgument::OPTIONAL,
                'GROW chart id'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        
        $dialog = $this->getHelperSet()->get('dialog');
        
        $maternalheight = $dialog->askAndValidate(
            $output,
            '<info>Please enter the maternal height (cm): </info>',
            function ($value) {
                if (trim($value) == '') {
                    throw new InvalidArgumentException('The maternal height can not be empty');
                }
                return $value;
            }
        );
        
        $maternalweight = $dialog->askAndValidate(
            $output,
            '<info>Please enter the maternal weight (kg): </info>',
            function ($value) {
                if (trim($value) == '') {
                    throw new InvalidArgumentException('The maternal weight can not be empty');
                }
                return $value;
            }
        );
        
        $edd = $dialog->askAndValidate(
            $output,
            '<info>Please enter the EDD (YYYYMMDD): </info>',
            function ($value) {
                if (trim($value) == '') {
                    throw new InvalidArgumentException('The EDD can not be empty, and the format is YYYYMMDD');
                }
                return $value;
            }
        );
        
        $parity = $dialog->askAndValidate(
            $output,
            '<info>Please entry the parity: </info>',
            function ($value) {
                if (trim($value) === '') {
                    throw new InvalidArgumentException('The parity can not be empty');
                }
                return $value;
            }
        );
        
        $ethnicity = $dialog->select(
            $output,
            '<info>Please entry the ethnic, default is 0: </info>',
            Ethnicity::getEthnicity(),
            0
        );
        
        $version = array('NL2012', 'NL2013');
        
        $versionindex = $dialog->select(
            $output,
            '<info>Please entry the GROW version, default is 1</info>',
            $version,
            1
        );
        
        $growversion = $version[$versionindex];

        $preg = new Pregnancy();
        $preg->setEdd($edd);
        $preg->setEthnicity($ethnicity);
        $preg->setParity($parity);
        $preg->setMaternalheight($maternalheight);
        $preg->setMaternalweight($maternalweight);
        $preg->setGrowchartversion($growversion);
        
        $client = $this->client;
        try {
            $res = $client->registerPregnancy($preg);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        $output->writeln('<info>Growchartid: </info>' . $res);
    }
}
