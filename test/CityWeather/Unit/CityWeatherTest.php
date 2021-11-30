<?php

declare(strict_types=1);

namespace TuiMusement\Test\CityWeather\Unit;

use PHPUnit\Framework\TestCase;
use TuiMusement\CityWeather\Model\CityWeatherFacade;
use TuiMusement\Test\CityWeather\Repository\InMemoryCityRepository;
use TuiMusement\Test\CityWeather\Repository\InMemoryWeatherRepository;

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
        $milanWeather = aWeather('Light Rain', 'Sunny');
        $milanCity = aCity('Milan', 45.464664, 9.188540);
        $warsawWeather = aWeather('Sunny', 'Heavy Rain');
        $this->cityRepository->push($warsawCity);
        $this->cityRepository->push($milanCity);
        $this->weatherRepository->push($warsawCity->coordinates(), $warsawWeather);
        $this->weatherRepository->push($milanCity->coordinates(), $milanWeather);
        // when
        $cityWeather = iterator_to_array($this->cityWeatherFacade->all());
        // then
        self::assertContains(['city' => $warsawCity, 'weather' => $warsawWeather], $cityWeather);
        self::assertContains(['city' => $milanCity, 'weather' => $milanWeather], $cityWeather);
    }
}
