<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

interface WeatherRepository
{
    public function findIn(Coordinates $coordinates): Weather;
}
