<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure;

use Psr\Http\Message\ResponseInterface;

interface MusementAPI
{
    public function fetchAllCities(): ResponseInterface;
}
