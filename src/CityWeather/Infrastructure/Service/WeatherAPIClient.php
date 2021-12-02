<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Service;

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

    /**
     * @throws APICallException
     */
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
            $statusCode = $response->getStatusCode();

            if (401 === $statusCode) {
                throw new APICallException('WeatherAPI authorization problem. Check if the weather api key is valid.');
            }

            if (200 !== $statusCode) {
                /** @var array{ error: ?array{ message: ?string, code: ?string }} $responseBody */
                $responseBody = json_decode((string) $response->getBody(), true);
                $message = $responseBody['error']['message'] ?? '';
                throw APICallException::errorMessage('WeatherAPI', (string) $statusCode, $message);
            }

            return $response;
        } catch (ClientExceptionInterface) {
            throw new APICallException("Sorry, the WeatherApi doesn't respond");
        }
    }
}
