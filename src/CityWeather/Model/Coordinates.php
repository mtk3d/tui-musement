<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

class Coordinates
{
    public function __construct(
        private float $lat,
        private float $long
    ) {
    }

    public function toString(): string
    {
        return sprintf('%s,%s', $this->lat, $this->long);
    }
}
