<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Repository;

use TuiMusement\CityWeather\Model\Weather;

class WeatherFactory
{
    /**
     * @param array{forecast: array{forecastday: array<array{day: array{condition: array{text: string}}}>}} $data
     */
    public function fromArrayResponse(array $data): Weather
    {
        $forecastDays = $data['forecast']['forecastday'];
        $daysConditions = array_map(fn (array $day) => $day['day']['condition']['text'], $forecastDays);

        return new Weather(...$daysConditions);
    }
}
