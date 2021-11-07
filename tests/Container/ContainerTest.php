<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class ContainerTest extends TestCase
{
    public function testContainerBuildWhenAlreadyBuilt()
    {
        $container = new Sandbox\Container\Container();
        $containerReflection = new \ReflectionClass($container);
        $builtProperty = $containerReflection->getProperty('built');
        $builtProperty->setAccessible(true);
        $builtProperty->setValue($container, true);
        $this->expectException(\Sandbox\Exceptions\ContainerException::class);
        $container->build();
    }
}