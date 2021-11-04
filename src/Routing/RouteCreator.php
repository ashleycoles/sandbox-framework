<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RouteInterface;

class RouteCreator
{
    /**
     * Public interface for creating a route.
     * @param string $URI
     * @param string $method
     * @param callable $callable
     * @return Route
     */
    static public function createRoute(string $URI, string $method, callable $callable): RouteInterface
    {
        return new Route($URI, $method, $callable);
    }
}