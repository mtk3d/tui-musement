<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Infrastructure\Service\APICallException;
use TuiMusement\CityWeather\Infrastructure\WeatherAPI;
use TuiMusement\CityWeather\Model\Coordinates;
use TuiMusement\CityWeather\Model\RepositoryException;
use TuiMusement\CityWeather\Model\Weather;
use TuiMusement\CityWeather\Model\WeatherRepository;

class HttpWeatherRepository implements WeatherRepository
{
    public function __construct(
        private WeatherAPI $weatherAPI,
        private WeatherFactory $weatherFactory
    ) {
    }

    /**
     * @throws RepositoryException
     */
    public function findIn(Coordinates $coordinates): Weather
    {
        try {
            $weatherResponse = $this->weatherAPI->fetchWeatherFor($coordinates);
        } catch (APICallException $e) {
            throw new RepositoryException($e->getMessage());
        }

        /** @var array{ forecast: array{ forecastday: array<array{ day: array{ condition: array{ text: string } } }> } } $weather */
        $weather = json_decode((string) $weatherResponse->getBody(), true);

        return $this->weatherFactory->fromArrayResponse($weather);
    }
}
