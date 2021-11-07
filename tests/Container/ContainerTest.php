<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Sandbox\Exceptions\ContainerException;
use Sandbox\Factories\Request\RequestCreatorFactory;


class ContainerTest extends TestCase
{
    public function testContainerBuildWhenAlreadyBuilt()
    {
        $container = new Sandbox\Container\Container();
        $containerReflection = new \ReflectionClass($container);
        $builtProperty = $containerReflection->getProperty('built');
        $builtProperty->setAccessible(true);
        $builtProperty->setValue($container, true);
        $this->expectException(ContainerException::class);
        $container->build();
    }

    public function testContainerAddWhenAlreadyBuilt()
    {
        $container = new Sandbox\Container\Container();
        $containerReflection = new \ReflectionClass($container);
        $builtProperty = $containerReflection->getProperty('built');
        $builtProperty->setAccessible(true);
        $builtProperty->setValue($container, true);
        $mockFactory = $this->createMock(RequestCreatorFactory::class);
        $this->expectException(ContainerException::class);
        $container->add('test', $mockFactory);
    }

    public function testContainerAddWhenAlreadyAdded()
    {
        $container = new Sandbox\Container\Container();
        $mockFactory = $this->createMock(RequestCreatorFactory::class);
        $container->add('test', $mockFactory);
        $this->expectException(ContainerException::class);
        $container->add('test', $mockFactory);

    }

    public function testContainerGetWhenNotBuilt()
    {
        $container = new Sandbox\Container\Container();
        $this->expectException(ContainerException::class);
        $container->get('test');
    }

    public function testContainerGetWhenNotAdded()
    {
        $container = new Sandbox\Container\Container();
        $this->expectException(ContainerException::class);
        $container->get('test');
    }
}