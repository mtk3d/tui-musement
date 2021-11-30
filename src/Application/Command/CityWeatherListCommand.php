<?php

declare(strict_types=1);

namespace TuiMusement\Application\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TuiMusement\CityWeather\Model\City;
use TuiMusement\CityWeather\Application\CityWeatherFacade;
use TuiMusement\CityWeather\Model\RepositoryException;
use TuiMusement\CityWeather\Model\Weather;
use TuiMusement\CityWeather\Model\WeatherDay;

class CityWeatherListCommand extends Command
{
    protected static $defaultName = 'list:cities';

    public function __construct(
        private CityWeatherFacade $cityWeatherFacade
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('List all cities from TuiMusement with Weather');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $cityWeather = $this->cityWeatherFacade->all();

            /**
             * @var City    $city
             * @var Weather $weather
             */
            foreach ($cityWeather as [ 'city' => $city, 'weather' => $weather ]) {
                $output->writeln(sprintf(
                    'Processed city %s | %s - %s',
                    $city->name(),
                    $weather->conditionOn(WeatherDay::TODAY()),
                    $weather->conditionOn(WeatherDay::TOMORROW())
                ));
            }
        } catch (RepositoryException $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
