<?php

declare(strict_types=1);

namespace Sandbox\Routing;

use Sandbox\Exceptions\RouterException;
use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\ResponseInterface;
use Sandbox\Interfaces\RouteInterface;

class Router extends ActiveRouteResolver
{
    protected ResponseInterface $response;
    protected ContainerInterface $container;

    /**
     * Router constructor.
     *
     * @param RequestInterface   $request
     * @param ResponseInterface  $response
     * @param ContainerInterface $container
     */
    public function __construct(RequestInterface $request, ResponseInterface $response, ContainerInterface $container)
    {
        $this->request = $request;
        $this->response = $response;
        $this->container = $container;
    }

    /**
     * @param RouteInterface $route An object implementing the RouteInterface
     */
    public function registerRoute(RouteInterface $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * Finishes up routing.
     */
    public function resolve(): void
    {
        $activeRoute = $this->resolveRoutes();
        if ($activeRoute) {
            $controller = $this->container->get($activeRoute->getCallable());
            $response = $controller($this->request, $this->response);
            echo $response->sendHeaders()->getContent();
        } else {
            http_response_code(404);
            throw new RouterException('Page not found.');
        }
    }
}
