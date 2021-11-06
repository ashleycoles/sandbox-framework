<?php

declare(strict_types=1);


namespace Sandbox\Factories\Response;


use Sandbox\Container\Container;
use Sandbox\Response\ResponseHelper;

class ResponseHelperFactory
{
    public function __invoke(Container $container): ResponseHelper
    {
        return new ResponseHelper();
    }
}