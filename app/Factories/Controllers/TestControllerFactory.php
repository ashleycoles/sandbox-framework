<?php

declare(strict_types=1);

namespace TestApp\Factories\Controllers;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\FactoryInterface;
use TestApp\Controllers\TestController;

class TestControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container): TestController
    {
        return new TestController();
    }
}