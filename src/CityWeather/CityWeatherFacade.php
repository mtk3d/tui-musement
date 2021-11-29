<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

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
