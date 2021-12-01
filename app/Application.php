<?php

declare(strict_types=1);

namespace TuiMusement\App;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;

class Application extends BaseApplication
{
    /**
     * @param Command[] $commands
     */
    public function __construct(string $name = 'UNKNOWN', string $version = 'UNKNOWN', iterable $commands = [])
    {
        parent::__construct($name, $version);

        foreach ($commands as $command) {
            $this->add($command);
        }
    }
}
