<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Application;

use TuiMusement\CityWeather\Model\City;
use TuiMusement\CityWeather\Model\CityRepository;
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
     * @return array{ city: City, weather: Weather }[]
     */
    public function all(): array
    {
        $cities = $this->cityRepository->all();

        return array_map(fn (City $city) => [
            'city' => $city,
            'weather' => $this->weatherRepository->findIn($city->coordinates()),
        ], $cities);
    }
}
