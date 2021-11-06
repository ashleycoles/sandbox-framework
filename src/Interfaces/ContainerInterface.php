<?php

namespace Sandbox\Interfaces;

interface ContainerInterface
{
    /**
     * Adds a factory to the DIC
     * @param string $DICkey
     * @param callable $factory
     */
    public function add(string $DICkey, callable $factory): void;

    /**
     * Returns an instance from the DIC
     * @param string $DICkey
     * @return mixed
     */
    public function get(string $DICkey);

    /**
     * Builds the container - calls all factories and registers instances
     */
    public function build(): void;
}