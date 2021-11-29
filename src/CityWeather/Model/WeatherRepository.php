<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

interface WeatherRepository
{
    public function findIn(Coordinates $coordinates): Weather;
}
