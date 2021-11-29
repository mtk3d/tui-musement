<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure;

use Psr\Http\Message\ResponseInterface;
use TuiMusement\CityWeather\Infrastructure\Service\APICallException;

interface MusementAPI
{
    /**
     * @throws APICallException
     */
    public function fetchAllCities(): ResponseInterface;
}
