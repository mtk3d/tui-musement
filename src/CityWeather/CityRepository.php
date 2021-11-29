<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

interface CityRepository
{
    /**
     * @return City[]
     */
    public function all(): array;
}
