<?php

declare(strict_types=1);

use TuiMusement\CityWeather\City;
use TuiMusement\CityWeather\Coordinates;

function aCity(string $name, float $lat, float $long): City
{
    return new City($name, new Coordinates($lat, $long));
}
