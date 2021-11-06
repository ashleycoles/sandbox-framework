<?php

declare(strict_types=1);

namespace Sandbox\Factories\Response;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Response\Response;

class ResponseFactory
{
    public function __invoke(ContainerInterface $container): Response
    {
        return new Response();
    }
}