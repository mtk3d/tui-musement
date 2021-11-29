<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

class InMemoryWeatherRepository implements WeatherRepository
{
    /** @var Weather[] */
    private array $weather;

    public function findIn(Coordinates $coordinates): Weather
    {
        return $this->weather[$coordinates->toString()];
    }

    public function push(Coordinates $coordinates, Weather $weather): void
    {
        $this->weather[$coordinates->toString()] = $weather;
    }
}
