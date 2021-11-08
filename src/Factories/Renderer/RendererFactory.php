<?php

declare(strict_types=1);


namespace Sandbox\Factories\Renderer;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\FactoryInterface;
use Sandbox\Renderer\Renderer;

class RendererFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container): Renderer
    {
        return new Renderer('../app/Templates/');
    }
}