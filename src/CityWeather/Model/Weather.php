<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

class Weather
{
    /** @var string[] */
    private array $conditions;

    public function __construct(
        string $conditionToday,
        string $conditionTomorrow
    ) {
        $this->conditions = [
            WeatherDay::TODAY()->getValue() => $conditionToday,
            WeatherDay::TOMORROW()->getValue() => $conditionTomorrow,
        ];
    }

    public function conditionOn(WeatherDay $when): string
    {
        return $this->conditions[$when->getValue()];
    }
}
