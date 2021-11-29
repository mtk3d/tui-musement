<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

class City
{
    public function __construct(
        private string $name,
        private Coordinates $coordinates
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function coordinates(): Coordinates
    {
        return $this->coordinates;
    }
}
