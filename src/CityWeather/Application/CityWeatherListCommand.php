<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Application;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CityWeatherListCommand extends Command
{
    protected static $defaultName = 'list:cities';

    protected function configure()
    {
        $this->setDescription('List all cities from TuiMusement with Weather');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       $output->writeln('Not implemented yet');

       return Command::SUCCESS;
    }
}
