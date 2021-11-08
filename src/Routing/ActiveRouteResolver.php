<?php

declare(strict_types=1);

namespace Sandbox\Routing;

use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\RouteInterface;

class ActiveRouteResolver
{
    /**
     * Compares a Request with the array of Route objects.
     *
     * @param  array            $routes
     * @param  RequestInterface $request
     * @return RouteInterface
     */
    public static function resolveRoutes(array $routes, RequestInterface $request): ?RouteInterface
    {
        /* @var $route Route */
        foreach ($routes as $route) {
            if (
                self::resolveMethod($route->getMethod(), $request->getMethod())
                && self::resolveURI($route->getURI(), $request->getURI())
            ) {
                return $route;
            }
        }
        return null;
    }

    /**
     * Compares Route and Request methods.
     *
     * @param  string $routeMethod
     * @param  string $requestMethod
     * @return bool
     */
    protected static function resolveMethod(string $routeMethod, string $requestMethod): bool
    {
        return $routeMethod === $requestMethod ? true : false;
    }

    /**
     * Compares Route and Request URIs
     *
     * @param  string $routeURI
     * @param  string $requestURI
     * @return bool
     */
    protected static function resolveURI(string $routeURI, string $requestURI): bool
    {
        return $routeURI === $requestURI ? true : false;
    }
}
