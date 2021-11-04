<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RouteInterface;

class RouteCreator
{
    /**
     * Public interface for creating a route.
     * @param string $URI
     * @param string $method
     * @param string $content
     * @return Route
     */
    static public function createRoute(string $URI, string $method, string $content): RouteInterface
    {
        return new Route($URI, $method, $content);
    }
}