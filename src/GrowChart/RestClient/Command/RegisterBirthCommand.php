<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\RestClient\Client;
use GrowChart\Common\Birth;
use Exception;

/**
 * RegisterBirth demo code.
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class RegisterBirthCommand extends Command
{
    protected function configure()
    {
        $this->setName('rest:registerbirth')
            ->setDescription('Register baby birth')
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
                'growchartid',
                InputArgument::REQUIRED,
                'GROW chart id'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $apikey = $input->getArgument('apikey');
        $apisecret = $input->getArgument('apisecret');
        $growchartid = $input->getArgument('growchartid');

        $dialog = $this->getHelperSet()->get('dialog');
        $babydob = $dialog->ask(
            $output,
            '<info>Please entry the baby birth (YYYYMMDD):</info>'
        );

        $babygender = $dialog->select(
            $output,
            '<info>Please entry the baby gender(M):</info>',
            array('M' => 'Male', 'F' => 'Female'),
            'M'
        );

        $birthweight = $dialog->ask(
            $output,
            '<info>Please entry baby weight(g):</info>'
        );
        
        $birthheight = $dialog->ask(
            $output,
            '<info>Please entry baby heigth(cm):</info>'
        );

        $birthgestation = $dialog->ask(
            $output,
            '<info>Please entry birth gestation:</info>'
        );
       
        $antenataliugrdetection = $dialog->select(
            $output,
            '<info>Whether the baby is antenatal iugr detection?(N):</info>',
            array('Y' => 'Yes', 'N' => 'No'),
            'N'
        );

        $client = new Client($apikey, $apisecret);
        
        $birth = new Birth();
        $birth->setAntenataliugrdetection($antenataliugrdetection);
        $birth->setBabydob($babydob);
        $birth->setBabygender($babygender);
        $birth->setBirthgestation($birthgestation);
        $birth->setBirthweight($birthweight);
        $birth->setBirthheight($birthheight);
        $birth->setGrowchartid($growchartid);

        try {
            $res = $client->registerBirth($birth);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
        }

        $output->writeln($res);
    }
}
