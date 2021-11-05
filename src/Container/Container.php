<?php


namespace Sandbox\Container;


use Sandbox\Caller;
use Sandbox\Interfaces\ContainerInterface;

class Container implements ContainerInterface
{
    /**
     * @var array An array of factories
     */
    protected array $items = [];
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
     * @param string $callable
     * @param callable $factory
     */
    public function add(string $callable, callable $factory): void
    {
        if (!array_key_exists($callable, $this->items)){
            $this->items[$callable] = $factory;
        }
    }

    /**
     * Returns an instance from the DIC
     * @param string $callable
     * @return mixed
     */
    public function get(string $callable)
    {
        if (array_key_exists($callable, $this->instances)) {
            return $this->instances[$callable];
        }
    }

    /**
     * Builds the container - calls all factories and registers instances
     */
    public function build(): void
    {
        foreach ($this->items as $callable => $factory) {
            if (is_callable($factory)) {
                // Calls the factory, passing in the container object
                // Allows other factories to access the container for DI
                $this->instances[$callable] = $factory($this);
            }
        }
    }
}