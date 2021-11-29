<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Model\City;
use TuiMusement\CityWeather\Model\Coordinates;

class CityFactory
{
    /**
     * @param array{name: string, latitude: float, longitude: float} $data
     */
    public function fromArrayResponse(array $data): City
    {
        return new City(
            $data['name'],
            new Coordinates(
                $data['latitude'],
                $data['longitude']
            )
        );
    }
}
