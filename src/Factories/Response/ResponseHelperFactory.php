<?php

declare(strict_types=1);


namespace Sandbox\Factories\Response;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\FactoryInterface;
use Sandbox\Response\ResponseHelper;

class ResponseHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container): ResponseHelper
    {
        return new ResponseHelper();
    }
}