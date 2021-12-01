<?php

declare(strict_types=1);

namespace TuiMusement\Test\CityWeather\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;
use TuiMusement\App\Application;
use TuiMusement\App\Kernel;

class ListCommandTest extends TestCase
{
    private Application $application;

    public function setUp(): void
    {
        $this->application = Kernel::test()->app();
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
