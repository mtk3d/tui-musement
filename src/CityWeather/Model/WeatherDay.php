<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

use MyCLabs\Enum\Enum;

/**
 * @extends Enum<string>
 *
 * @method static WeatherDay TODAY()
 * @method static WeatherDay TOMORROW()
 */
class WeatherDay extends Enum
{
    /* @phpstan-ignore-next-line */
    private const TODAY = 'TODAY';
    /* @phpstan-ignore-next-line */
    private const TOMORROW = 'TOMORROW';
}
