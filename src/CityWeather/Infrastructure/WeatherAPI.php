<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure;

use Psr\Http\Message\ResponseInterface;
use TuiMusement\CityWeather\Model\Coordinates;

interface WeatherAPI
{
    public function fetchWeatherFor(Coordinates $coordinates): ResponseInterface;
}
