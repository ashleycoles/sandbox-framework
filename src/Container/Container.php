<?php


namespace Sandbox\Container;


use Sandbox\Interfaces\ContainerInterface;

class Container implements ContainerInterface
{
    protected array $items = [];

    public function add(string $callable, callable $factory)
    {
        if (!array_key_exists($callable, $this->items)){
            $this->items[$callable] = $factory;
        }
    }

    public function get(string $callable)
    {
        if (array_key_exists($callable, $this->items)) {
            if (is_callable($this->items[$callable])) {
                return $this->items[$callable]($this);
            }
        }
    }
}