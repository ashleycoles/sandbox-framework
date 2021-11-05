<?php

namespace Sandbox\Interfaces;

interface ContainerInterface
{
    public function add(string $callable, callable $factory);

    public function get(string $callable);
}