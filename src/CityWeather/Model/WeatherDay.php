<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static WeatherDay TODAY()
 * @method static WeatherDay TOMORROW()
 */
class WeatherDay extends Enum
{
    private const TODAY = 'TODAY';
    private const TOMORROW = 'TOMORROW';
}
