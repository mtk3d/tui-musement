<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Infrastructure\MusementAPI;
use TuiMusement\CityWeather\Infrastructure\Service\APICallException;
use TuiMusement\CityWeather\Model\City;
use TuiMusement\CityWeather\Model\CityRepository;
use TuiMusement\CityWeather\Model\RepositoryException;

class HttpCityRepository implements CityRepository
{
    public function __construct(
        private MusementAPI $musementAPI,
        private CityFactory $cityFactory
    ) {
    }

    /**
     * @return City[]
     *
     * @throws RepositoryException
     */
    public function all(): array
    {
        try {
            $citiesResponse = $this->musementAPI->fetchAllCities();
        } catch (APICallException $e) {
            throw new RepositoryException($e->getMessage());
        }

        /** @var array<array{name: string, latitude: float, longitude: float}> $cities */
        $cities = json_decode((string) $citiesResponse->getBody(), true);

        return array_map([$this->cityFactory, 'fromArrayResponse'], $cities);
    }
}
