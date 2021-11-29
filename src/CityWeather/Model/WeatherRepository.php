<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

interface WeatherRepository
{
    /**
     * @throws RepositoryException
     */
    public function findIn(Coordinates $coordinates): Weather;
}
