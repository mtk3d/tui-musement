<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Model\CityRepository;

class HttpCityRepository implements CityRepository
{
    public function all(): array
    {
        return [];
    }
}