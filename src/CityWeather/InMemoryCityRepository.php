<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

class InMemoryCityRepository implements CityRepository
{
    /** @var City[] */
    private array $cities;

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
