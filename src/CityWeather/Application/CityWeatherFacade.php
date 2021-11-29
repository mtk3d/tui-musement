<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Application;

use TuiMusement\CityWeather\Model\City;
use TuiMusement\CityWeather\Model\CityRepository;
use TuiMusement\CityWeather\Model\RepositoryException;
use TuiMusement\CityWeather\Model\Weather;
use TuiMusement\CityWeather\Model\WeatherRepository;

class CityWeatherFacade
{
    public function __construct(
        private CityRepository $cityRepository,
        private WeatherRepository $weatherRepository
    ) {
    }

    /**
     * @return iterable<array{ city: City, weather: Weather }>
     *
     * @throws RepositoryException
     */
    public function all(): iterable
    {
        $cities = $this->cityRepository->all();

        foreach ($cities as $city) {
            yield [
                'city' => $city,
                'weather' => $this->weatherRepository->findIn($city->coordinates()),
            ];
        }
    }
}
