<?php

declare(strict_types=1);

namespace Sandbox\Factories\Response;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\FactoryInterface;
use Sandbox\Response\Response;

class ResponseFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container): Response
    {
        return new Response();
    }
}