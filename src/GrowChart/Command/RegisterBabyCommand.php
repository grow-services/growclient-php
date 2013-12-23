<?php

namespace GrowChart\Command;

use Exception;
use GrowChart\Command;
use GrowChart\Common\Baby;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Register baby demo code.
 *
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class RegisterBabyCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('grow:registerbaby')
            ->setDescription('Register baby birth')
            ->addArgument(
                'growchartid',
                InputArgument::REQUIRED,
                'GROW chart id'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
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
        
        $birthgestation = $dialog->ask(
            $output,
            '<info>Please entry birth gestation:</info>'
        );
        
        $birth = new Baby();
        $birth->setBabydob($babydob);
        $birth->setBabygender($babygender);
        $birth->setBirthgestation($birthgestation);
        $birth->setBirthweight($birthweight);
        $birth->setGrowchartid($growchartid);

        try {
            $res = $this->client->registerBaby($birth);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
        }

        $output->writeln($res);
    }
}
