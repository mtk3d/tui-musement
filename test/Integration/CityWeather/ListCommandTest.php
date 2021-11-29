<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;
use TuiMusement\Application;
use TuiMusement\Kernel;

class ListCommandTest extends TestCase
{
    private Application $application;

    public function setUp(): void
    {
        $kernel = Kernel::test();
        $this->application = $kernel->app();
    }

    public function testRunningCommand(): void
    {
        $command = $this->application->find('list:cities');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Processed city Amsterdam | Heavy rain - Moderate rain', $output);
    }
}
