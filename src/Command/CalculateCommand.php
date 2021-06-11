<?php

namespace RicardoKovalski\Interest\Console\Command;

use Exception;
use RicardoKovalski\Interest\Console\Util\InterestCalculation;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CalculateCommand extends Command
{
    protected function configure()
    {
        parent::configure();

        $this->setName('calculate')
            ->setDescription('Calculate a interest')
            ->addArgument(
                'typeInterest',
                InputArgument::REQUIRED,
                'Supported type Financial, Compound and Simple.'
            )
            ->addArgument(
                'interestValue',
                InputArgument::REQUIRED,
                'Supported type float. Ex.: "0.07", "2.75", "5.06".'
            )
            ->addArgument(
                'total',
                InputArgument::REQUIRED,
                'Supported type float. Ex.: "56.09", "349.90", "1000.78".'
            )
            ->addArgument(
                'numberInstallment',
                InputArgument::OPTIONAL,
                'Supported type int.',
                1
            );
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $typeInterest = $input->getArgument('typeInterest');
        $interestValue = $input->getArgument('interestValue');
        $total = $input->getArgument('total');
        $numberInstallment = $input->getArgument('numberInstallment');

        $valueCalculated = $this->calculateInterest($typeInterest, $interestValue, $total, $numberInstallment);

        $output->writeln($valueCalculated);
    }

    /**
     * @throws Exception
     */
    protected function calculateInterest($typeInterest, $interestValue, $total, $numberInstallment)
    {
        $types = ['Compound', 'Financial', 'Simple'];

        if (array_key_exists($typeInterest, $types)) {
            throw new Exception('Invalid type interest. Supported "Compound", "Financial" and "Simple".');
        }

        $interest = InterestCalculation::$typeInterest($interestValue);

        $interest->appendTotalCapital($total);

        return $interest->getInterestByInstallmentNumber($numberInstallment);
    }


}
