<?php

declare(strict_types=1);

namespace TuiMusement\CityWeather\Infrastructure\Service;

use Exception;

class APICallException extends Exception
{
    public static function errorMessage(string $name, string $code, string $message): APICallException
    {
        return new APICallException(
            sprintf('Sorry, the %s respond HTTP %s code with message: %s', $name, $code, $message)
        );
    }
}
