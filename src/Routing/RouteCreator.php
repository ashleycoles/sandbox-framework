<?php

declare(strict_types=1);

namespace Sandbox\Routing;

use Sandbox\Interfaces\RouteInterface;

class RouteCreator
{
    /**
     * Public interface for creating a route.
     *
     * @param  string $URI
     * @param  string $method
     * @param  string $callable
     * @return Route
     */
    public static function createRoute(string $URI, string $method, string $callable): RouteInterface
    {
        return new Route($URI, $method, $callable);
    }
}
