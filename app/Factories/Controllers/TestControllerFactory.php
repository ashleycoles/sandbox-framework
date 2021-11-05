<?php

declare(strict_types=1);

namespace TestApp\Factories\Controllers;


use Sandbox\Interfaces\ContainerInterface;
use TestApp\Controllers\TestController;

class TestControllerFactory
{
    public function __invoke(ContainerInterface $container): TestController
    {
        return new TestController();
    }
}