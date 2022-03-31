<?php

declare(strict_types=1);

namespace Sandbox\Container;

use Sandbox\Exceptions\ContainerException;
use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\FactoryInterface;

class Container implements ContainerInterface
{
    /**
     * @var array An array of factories
     */
    protected array $factories = [];
    /**
     * @var array An array of instances created by calling factories in $items
     */
    protected array $instances = [];
    /**
     * @var bool Flag to show if container has been built
     */
    protected bool $built = false;

    /**
     * Adds a factory to the DIC
     *
     * @param string $DICkey The DIC key
     * @param FactoryInterface $factory The object's factory, must be an invokable object
     * @throws ContainerException
     */
    public function add(string $DICkey, FactoryInterface $factory): void
    {
        if (!array_key_exists($DICkey, $this->factories)) {
            $this->factories[$DICkey] = $factory;
        } else {
            throw new ContainerException('Callable already exists.');
        }

        $this->build();
    }

    /**
     * Returns an instance from the DIC
     *
     * @param  string $DICkey A DIC key
     * @return mixed
     * @throws ContainerException
     */
    public function get(string $DICkey)
    {
        if (!$this->built) {
            throw new ContainerException('Container has not yet been built.');
        }

        if (array_key_exists($DICkey, $this->instances)) {
            return $this->instances[$DICkey];
        } throw new ContainerException('Callable not found.');
    }

    /**
     * Builds the container - calls all factories and registers instances
     * The container may only be built once
     *
     * @throws ContainerException
     */
    public function build(): void
    {
        foreach ($this->factories as $DICkey => $factory) {
            if (!is_callable($factory)) {
                throw new ContainerException('Factory is not callable.');
            }
            if (!array_key_exists($DICkey, $this->instances)) {
                // Calls the factory, passing in the container object
                // Allows other factories to access the container for DI
                $this->instances[$DICkey] = $factory($this);
            }
        }
        // Mark the container as built
        $this->built = true;
    }
}
