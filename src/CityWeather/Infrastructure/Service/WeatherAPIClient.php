<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Service;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use TuiMusement\CityWeather\Infrastructure\WeatherAPI;
use TuiMusement\CityWeather\Model\Coordinates;

class WeatherAPIClient implements WeatherAPI
{
    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private UriFactoryInterface $uriFactory,
        private string $weatherApiUrl,
        private string $weatherApiKey
    ) {
    }

    public function fetchWeatherFor(Coordinates $coordinates): ResponseInterface
    {
        $uri = $this->uriFactory
            ->createUri($this->weatherApiUrl)
            ->withPath('/v1/forecast.json')
            ->withQuery(http_build_query([
                'key' => $this->weatherApiKey,
                'q' => $coordinates->toString(),
                'days' => 2,
                'aqi' => 'no',
            ]));

        $request = $this->requestFactory->createRequest('GET', $uri);

        try {
            $response = $this->client->sendRequest($request);
            if (200 !== $response->getStatusCode()) {
                throw new Exception(sprintf('Sorry, the WeatherApi respond with %s HTTP code', $response->getStatusCode()));
            }

            return $response;
        } catch (ClientExceptionInterface $e) {
            throw new Exception("Sorry, the WeatherApi doesn't respond");
        }
    }
}
