<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GrowChart\RestClient\Client;
use GrowChart\Common\Pregnancy;
use GrowChart\Common\Ethnicity;
use InvalidArgumentException;
use Exception;

class RegisterPregnancyCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('rest:registerpregnancy')
            ->setDescription('Register a pregnancy')
            ->addArgument(
                'apikey',
                InputArgument::REQUIRED,
                'API Key'
            )
            ->addArgument(
                'apisecret',
                InputArgument::REQUIRED,
                'API Secret'
            )
            ->addArgument(
                'reference',
                InputArgument::REQUIRED,
                'Reference'
            );
            /*
            ->addArgument(
                'maternalheight',
                InputArgument::REQUIRED,
                'Maternal height'
            )
            ->addArgument(
                'maternalweight',
                InputArgument::REQUIRED,
                'Maternal weight'
            )
            ->addArgument(
                'ethnicity',
                InputArgument::REQUIRED,
                'Ethnicity'
            )
            ->addArgument(
                'parity',
                InputArgument::REQUIRED,
                'Parity'
            )
            ->addArgument(
                'edd',
                InputArgument::REQUIRED,
                'EDD'
            )
            ->addArgument(
                'growversion',
                InputArgument::REQUIRED,
                'GROW version'
            )
            ->addArgument(
                'firstname',
                InputArgument::OPTIONAL,
                'Firstname'
            )
            ->addArgument(
                'lastname',
                InputArgument::OPTIONAL,
                'Lastname'
            )
        ;*/
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $reference = $input->getArgument('reference');
        $apisecret = $input->getArgument('apisecret');
        $apikey = $input->getArgument('apikey');
        
        /*
        $firstname = $input->getArgument('firstname');
        $lastname = $input->getArgument('lastname');
        $edd = $input->getArgument('edd');
        $growversion = $input->getArgument('growversion');
        $parity = $input->getArgument('party');
        $ethnicity = $input->getArgument('ethnicity');
        $maternalheight = $input->getArgument('maternalheight');
        $maternalweight = $input->getArgument('maternalweight');
        // */
        
        $dialog = $this->getHelperSet()->get('dialog');
        $firstname = $dialog->ask(
            $output,
            '<info>Please enter the first name of mohter: </info>'
        );
        
        $lastname = $dialog->ask(
            $output,
            '<info>Please enter the last name of mohter: </info>'
        );
        
        $maternaldob = $dialog->ask($output, '<info>Please entry the maternal dob (YYYYMMDD):</info>');
        
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
        $preg->setReference($reference);
        $preg->setFirstname($firstname);
        $preg->setLastname($lastname);
        $preg->setEdd($edd);
        $preg->setEthnicity($ethnicity);
        $preg->setParity($parity);
        $preg->setMaternaldob($maternaldob);
        $preg->setMaternalheight($maternalheight);
        $preg->setMaternalweight($maternalweight);
        $preg->setGrowversion($growversion);
        
        $client = new Client($apikey, $apisecret);
        
        $client->setBaseUrl('http://linkorbapi.l.cn/api/grow/rest');
        
        try {
            $res = $client->registerPregnancy($preg);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
            exit;
        }
        //  $output->writeln($client->getQueryUrl());
        $output->writeln($res);
    }
}
