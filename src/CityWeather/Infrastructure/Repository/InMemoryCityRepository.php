<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Model\City;
use TuiMusement\CityWeather\Model\CityRepository;

class InMemoryCityRepository implements CityRepository
{
    /** @var City[] */
    private array $cities = [];

    public function __construct()
    {
        $this->cities[] = aCity('Warsaw', 10, 10);
    }

    /**
     * @return City[]
     */
    public function all(): array
    {
        return $this->cities;
    }

    public function push(City $city): void
    {
        $this->cities[] = $city;
    }
}
