<?php


namespace Sandbox\Container;


use Sandbox\Exceptions\ContainerException;
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
     * @param string $callable The DIC key
     * @param callable $factory The object's factory, must be an invokable object
     * @throws ContainerException
     */
    public function add(string $callable, callable $factory): void
    {
        if (!array_key_exists($callable, $this->items)) {
            $this->items[$callable] = $factory;
        } else throw new ContainerException('Callable already exists');
    }

    /**
     * Returns an instance from the DIC
     * @param string $callable A DIC key
     * @return mixed
     * @throws ContainerException
     */
    public function get(string $callable)
    {
        if (!$this->built) throw new ContainerException('Container has not yet been built');
        if (array_key_exists($callable, $this->instances)) {
            return $this->instances[$callable];
        }
        throw new ContainerException('Callable not found.');
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
            } else throw new ContainerException('Factory is not callable.');
        }
        $this->built = true;
    }
}