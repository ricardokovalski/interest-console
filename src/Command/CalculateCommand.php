<?php

namespace RicardoKovalski\Interest\Console\Command;

use Exception;
use RicardoKovalski\Interest\Console\Util\InterestCalculation;
use RicardoKovalski\Interest\Console\Util\Types;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class CalculateCommand extends Command
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
        $typeInterest = ucfirst(strtolower($input->getArgument('typeInterest')));

        if (! array_key_exists($typeInterest, Types::all())) {
            throw new Exception('Invalid type interest. Supported "Compound", "Financial" and "Simple".');
        }

        $interestValue = filter_var(
            $input->getArgument('interestValue'),
            FILTER_VALIDATE_FLOAT,
            array(
                'default' => 0.00
            )
        );

        $total = filter_var(
            $input->getArgument('total'),
            FILTER_VALIDATE_FLOAT,
            array(
                'default' => 0.00
            )
        );

        $numberInstallment = filter_var(
            $input->getArgument('numberInstallment'),
            FILTER_VALIDATE_FLOAT,
            array(
                'default' => 1
            )
        );

        $valueCalculated = $this->calculateInterest($typeInterest, $interestValue, $total, $numberInstallment);

        $output->writeln($valueCalculated);
    }

    /**
     * @throws Exception
     */
    protected function calculateInterest($typeInterest, $interestValue, $total, $numberInstallment)
    {
        $interest = InterestCalculation::$typeInterest($interestValue);

        $interest->appendTotalCapital($total);

        return $interest->getInterestByInstallmentNumber($numberInstallment);
    }
}
