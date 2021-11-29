<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

use PHPUnit\Framework\TestCase;

class CityWeatherTest extends TestCase
{
    private InMemoryCityRepository $cityRepository;
    private InMemoryWeatherRepository $weatherRepository;
    private CityWeatherFacade $cityWeatherFacade;

    public function setUp(): void
    {
        $this->cityRepository = new InMemoryCityRepository();
        $this->weatherRepository = new InMemoryWeatherRepository();
        $this->cityWeatherFacade = new CityWeatherFacade($this->cityRepository, $this->weatherRepository);
    }

    public function testLinkWeatherWithCity(): void
    {
        // given
        $warsawCity = aCity('Warsaw', 52.237049, 21.017532);
        $milanCity = aCity('Milan', 45.464664, 9.188540);
        $warsawWeather = aWeather('Sunny', 'Heavy Rain');
        $milanWeather = aWeather('Light Rain', 'Sunny');
        $this->cityRepository->push($warsawCity);
        $this->cityRepository->push($milanCity);
        $this->weatherRepository->push($warsawCity->coordinates(), $warsawWeather);
        $this->weatherRepository->push($milanCity->coordinates(), $milanWeather);
        // when
        $cityWeather = $this->cityWeatherFacade->all();
        // then
        self::assertContains(['city' => $warsawCity, 'weather' => $warsawWeather], $cityWeather);
        self::assertContains(['city' => $milanCity, 'weather' => $milanWeather], $cityWeather);
    }
}
