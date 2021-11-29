<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure;

use Psr\Http\Message\ResponseInterface;
use TuiMusement\CityWeather\Infrastructure\Service\APICallException;
use TuiMusement\CityWeather\Model\Coordinates;

interface WeatherAPI
{
    /**
     * @throws APICallException
     */
    public function fetchWeatherFor(Coordinates $coordinates): ResponseInterface;
}
