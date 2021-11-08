<?php


use Sandbox\Interfaces\ContainerInterface;
use TestApp\Factories\Controllers\TestControllerFactory;

return function (ContainerInterface $container) {
    $container->add('TestController', new TestControllerFactory());
};