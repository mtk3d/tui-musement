<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Model\Coordinates;
use TuiMusement\CityWeather\Model\Weather;
use TuiMusement\CityWeather\Model\WeatherRepository;

class HttpWeatherRepository implements WeatherRepository
{
    public function findIn(Coordinates $coordinates): Weather
    {
        return new Weather('', '');
    }
}