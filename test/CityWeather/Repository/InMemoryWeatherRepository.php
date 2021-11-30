<?php

declare(strict_types=1);

namespace TuiMusement\Test\CityWeather\Repository;

use TuiMusement\CityWeather\Model\Coordinates;
use TuiMusement\CityWeather\Model\Weather;
use TuiMusement\CityWeather\Model\WeatherRepository;

class InMemoryWeatherRepository implements WeatherRepository
{
    /** @var Weather[] */
    private array $weather = [];

    public function findIn(Coordinates $coordinates): Weather
    {
        return $this->weather[$coordinates->toString()];
    }

    public function push(Coordinates $coordinates, Weather $weather): void
    {
        $this->weather[$coordinates->toString()] = $weather;
    }
}
