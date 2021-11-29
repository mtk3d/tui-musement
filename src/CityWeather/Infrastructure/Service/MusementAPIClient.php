<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Service;

use Exception;
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

    public function fetchAllCities(): ResponseInterface
    {
        $uri = $this->uriFactory
            ->createUri($this->musementApiUri)
            ->withPath('/api/v3/cities.json');

        $request = $this->requestFactory->createRequest('GET', $uri);

        try {
            $response = $this->client->sendRequest($request);
            if (200 !== $response->getStatusCode()) {
                throw new Exception(sprintf('Sorry, the MusementAPI respond with %s HTTP code', $response->getStatusCode()));
            }

            return $response;
        } catch (ClientExceptionInterface) {
            throw new Exception("Sorry, the MusementAPI doesn't respond");
        }
    }
}
