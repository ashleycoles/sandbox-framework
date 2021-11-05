<?php


namespace Sandbox\Factories\Response;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Response\ResponseCreator;

class ResponseCreatorFactory
{
    public function __invoke(ContainerInterface $container): ResponseCreator
    {
        return new ResponseCreator();
    }
}