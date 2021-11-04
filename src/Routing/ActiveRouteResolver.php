<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RequestInterface;

class ActiveRouteResolver
{
    /**
     * Compares a Request with the array of Route objects.
     * @param array $routes
     * @param RequestInterface $request
     * @return Route
     */
    static public function resolveRoutes(array $routes, RequestInterface $request): Route
    {
        /* @var $route Route */
        foreach($routes as $route) {
            if (
                self::resolveMethod($route->getMethod(), $request->getMethod()) &&
                self::resolveURI($route->getURI(), $request->getURI())
            ) {
                return $route;
            }
        }
        // TODO: add something for 404
    }

    /**
     * Compares Route and Request methods.
     * @param string $routeMethod
     * @param string $requestMethod
     * @return bool
     */
    static protected function resolveMethod(string $routeMethod, string $requestMethod): bool
    {
        return $routeMethod === $requestMethod ? true : false;
    }

    /**
     * Compares Route and Request URIs
     * @param string $routeURI
     * @param string $requestURI
     * @return bool
     */
    static protected function resolveURI(string $routeURI, string $requestURI): bool
    {
        return $routeURI === $requestURI ? true : false;
    }

}