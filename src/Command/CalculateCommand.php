<?php

namespace RicardoKovalski\Interest\Console\Command;

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
                'interestValue',
                InputArgument::REQUIRED,
                'Supported type float. Ex.: "0.07", "2.75", "5.06"'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }


}
