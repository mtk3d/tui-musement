<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

class Weather
{
    /** @var string[] */
    private array $conditions;

    public function __construct(
        string $conditionToday,
        string $conditionTomorrow
    ) {
        $this->conditions = [
            'today' => $conditionToday,
            'tomorrow' => $conditionTomorrow
        ];
    }

    public function conditionOn(string $when = 'today'): string
    {
        return $this->conditions[$when];
    }
}
