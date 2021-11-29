<?php

declare(strict_types=1);

namespace TuiMusement;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Kernel
{
    private ContainerBuilder $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__ . '/../config'));
        $loader->load('services.yml');
        $loader->load('parameters.yml');
        $this->container->compile();
    }

    public function run(): void
    {
        /** @var Application $app */
        $app = $this->container->get(Application::class);
        $app->run();
    }
}
