<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Model;

interface CityRepository
{
    /**
     * @return City[]
     *
     * @throws RepositoryException
     */
    public function all(): array;
}
