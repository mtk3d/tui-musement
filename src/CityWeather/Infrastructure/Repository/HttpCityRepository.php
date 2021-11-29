<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Infrastructure\MusementAPI;
use TuiMusement\CityWeather\Model\CityRepository;

class HttpCityRepository implements CityRepository
{
    public function __construct(
        private MusementAPI $musementAPI,
        private CityFactory $cityFactory
    ) {
    }

    public function all(): array
    {
        $citiesResponse = $this->musementAPI->fetchAllCities();
        $cities = json_decode((string) $citiesResponse->getBody(), true);

        return array_map([$this->cityFactory, 'fromArrayResponse'], $cities);
    }
}
