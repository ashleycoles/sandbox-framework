<?php

namespace Sandbox\Interfaces;


interface FactoryInterface
{
    public function __invoke(ContainerInterface $container);
}