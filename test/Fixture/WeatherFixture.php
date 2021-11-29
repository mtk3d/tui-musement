<?php

declare(strict_types=1);

use TuiMusement\CityWeather\Model\Weather;

function aWeather(string $conditionToday, string $conditionTomorrow): Weather
{
    return new Weather($conditionToday, $conditionTomorrow);
}
