<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Infrastructure\WeatherAPI;
use TuiMusement\CityWeather\Model\Coordinates;
use TuiMusement\CityWeather\Model\Weather;
use TuiMusement\CityWeather\Model\WeatherRepository;

class HttpWeatherRepository implements WeatherRepository
{
    public function __construct(
        private WeatherAPI $weatherAPI,
        private WeatherFactory $weatherFactory
    ) {
    }

    public function findIn(Coordinates $coordinates): Weather
    {
        $weatherResponse = $this->weatherAPI->fetchWeatherFor($coordinates);
        $weather = json_decode((string) $weatherResponse->getBody(), true);

        return $this->weatherFactory->fromArrayResponse($weather);
    }
}
