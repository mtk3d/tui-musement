<?php

declare(strict_types=1);

namespace TuiMusement\Test\CityWeather\Fake;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use TuiMusement\CityWeather\Infrastructure\WeatherAPI;
use TuiMusement\CityWeather\Model\Coordinates;

class WeatherAPIFake implements WeatherAPI
{
    private Psr17Factory $factory;

    public function __construct()
    {
        $this->factory = new Psr17Factory();
    }

    public function fetchWeatherFor(Coordinates $coordinates): ResponseInterface
    {
        $content = json_encode([
            'forecast' => [
                'forecastday' => [
                    [
                        'day' => [
                            'condition' => [
                                'text' => 'Heavy rain',
                            ],
                        ],
                    ],
                    [
                        'day' => [
                            'condition' => [
                                'text' => 'Moderate rain',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
        $body = $this->factory->createStream($content);

        return $this->factory->createResponse(200)->withBody($body);
    }
}
