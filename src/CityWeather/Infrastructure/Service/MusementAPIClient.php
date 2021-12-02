<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Service;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use TuiMusement\CityWeather\Infrastructure\MusementAPI;

class MusementApiClient implements MusementAPI
{
    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private UriFactoryInterface $uriFactory,
        private string $musementApiUri
    ) {
    }

    /**
     * @throws APICallException
     */
    public function fetchAllCities(): ResponseInterface
    {
        $uri = $this->uriFactory
            ->createUri($this->musementApiUri)
            ->withPath('/api/v3/cities.json');

        $request = $this->requestFactory->createRequest('GET', $uri);

        try {
            $response = $this->client->sendRequest($request);
            $statusCode = $response->getStatusCode();

            if (200 !== $statusCode) {
                /** @var array{ message: ?string, code: ?string } $responseBody */
                $responseBody = json_decode((string) $response->getBody(), true);
                $message = $responseBody['message'] ?? '';
                throw APICallException::errorMessage('MusementAPI', (string) $statusCode, $message);
            }

            return $response;
        } catch (ClientExceptionInterface) {
            throw new APICallException("Sorry, the MusementAPI doesn't respond");
        }
    }
}
