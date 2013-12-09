<?php

namespace GrowChart\RestClient\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GrowChart\Common\ChartPdf;
use GrowChart\RestClient\Client;
use GrowChart\Common\Chart;
use Exception;

/**
 * Get chart pdf demo.
 * 
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class GetPdfCommand extends Command
{
    protected function configure()
    {
        $this->setName('rest:getpdf')
            ->setDescription('Get GROW chart pdf')
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

        $firstname = $dialog->ask(
            $output,
            '<info>Please entry the firstname:</info>'
        );

        $lastname = $dialog->ask(
            $output,
            '<info>Please entry the lastname:</info>'
        );
        
        $maternaldob = $dialog->ask(
            $output,
            '<info>Please entry maternal dob:</info>'
        );

        $maternalreference = $dialog->ask(
            $output,
            '<info>Please entry maternal reference:</info>'
        );

        $babyname = $dialog->ask(
            $output,
            '<info>Please entry the baby name:</info>'
        );

        $babygestation = $dialog->ask(
            $output,
            '<info>Please entry the baby gestation:</info>'
        );

        $babygender = $dialog->select(
            $output,
            '<info>Please entry the baby gender(M):</info>',
            array('M' => 'Male' , 'F' => 'Female'),
            'M'
        );

        $babybirthweight = $dialog->ask(
            $output,
            '<info>Pleae entry the baby weight when birth (g)</info>'
        );

        $language = $dialog->select(
            $output,
            '<info>Please entry the text language (en_UK):</info>',
            Chart::getSupportedLanguage(),
            '0'
        );

        $pdf = new ChartPdf();
        $pdf->setBabybirthweight($babybirthweight);
        $pdf->setBabygender($babygender);
        $pdf->setBabygestation($babygestation);
        $pdf->setBabyname($babyname);
        $pdf->setFirstname($firstname);
        $pdf->setGrowchartid($growchartid);
        $pdf->setLanguage($language);
        $pdf->setLastname($lastname);
        $pdf->setMaternaldob($maternaldob);
        $pdf->setMaternalreference($maternalreference);

        $client = new Client($apikey, $apisecret);
        try {
            $url = $client->getPDF($pdf);
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
        }
        
        $output->writeln($url);
        
    }
}
