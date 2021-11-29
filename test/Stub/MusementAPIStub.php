<?php

declare(strict_types=1);

namespace TuiMusement\Test\Stub;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use TuiMusement\CityWeather\Infrastructure\MusementAPI;

class MusementAPIStub implements MusementAPI
{
    private Psr17Factory $factory;

    public function __construct()
    {
        $this->factory = new Psr17Factory();
    }

    public function fetchAllCities(): ResponseInterface
    {
        $content = json_encode([
            [
                'name' => 'Amsterdam',
                'latitude' => 52.374,
                'longitude' => 4.9,
            ],
        ]);
        $body = $this->factory->createStream($content);

        return $this->factory->createResponse(200)->withBody($body);
    }
}
