<?php

declare(strict_types=1);

namespace Sandbox\Routing;

use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\RouteInterface;

abstract class ActiveRouteResolver
{
    protected array $routes = [];
    protected RequestInterface $request;


    /**
     * Compares a Request with the array of Route objects.
     *
     * @return RouteInterface
     */
    public function resolveRoutes(): ?RouteInterface
    {
        /* @var $route Route */
        foreach ($this->routes as $route) {
            if (
                $this->resolveMethod($route->getMethod(), $this->request->getMethod())
                && $this->resolveURI($route->getURI(), $this->request->getURI())
            ) {
                return $route;
            }
        }
        return null;
    }

    /**
     * @param RouteInterface $route An object implementing the RouteInterface
     */
    public function registerRoute(RouteInterface $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * Compares Route and Request methods.
     *
     * @param  string $routeMethod
     * @param  string $requestMethod
     * @return bool
     */
    protected function resolveMethod(string $routeMethod, string $requestMethod): bool
    {
        return $routeMethod === $requestMethod;
    }

    /**
     * Compares Route and Request URIs
     *
     * @param  string $routeURI
     * @param  string $requestURI
     * @return bool
     */
    protected function resolveURI(string $routeURI, string $requestURI): bool
    {
        return $routeURI === $requestURI;
    }
}
