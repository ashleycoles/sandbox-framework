<?php

namespace Sandbox\Interfaces;

interface ContainerInterface
{
    /**
     * Adds a factory to the DIC
     * @param string $callable
     * @param callable $factory
     */
    public function add(string $callable, callable $factory): void;

    /**
     * Returns an instance from the DIC
     * @param string $callable
     * @return mixed
     */
    public function get(string $callable);

    /**
     * Builds the container - calls all factories and registers instances
     */
    public function build(): void;
}