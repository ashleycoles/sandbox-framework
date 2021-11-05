<?php

declare(strict_types=1);

namespace Sandbox\Factories\Request;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Request\RequestCreator;

class RequestCreatorFactory
{
    public function __invoke(ContainerInterface $container): RequestCreator
    {
        return new RequestCreator();
    }
}