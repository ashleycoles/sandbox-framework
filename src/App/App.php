<?php

declare(strict_types=1);

namespace Sandbox\App;

use Sandbox\Exceptions\RouterException;
use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\ResponseInterface;
use Sandbox\Routing\RouteCreator;
use Sandbox\Routing\Router;

class App
{
    protected ResponseInterface $response;
    protected RequestInterface $request;
    protected Router $router;

    /**
     * RouteMethodSetter constructor.
     *
     * @param ResponseInterface $response
     * @param RequestInterface  $request
     * @param Router            $router
     */
    public function __construct(ResponseInterface $response, RequestInterface $request, Router $router)
    {
        $this->response = $response;
        $this->request = $request;
        $this->router = $router;
    }

    /**
     * Creates a GET route.
     *
     * @param string $URI
     * @param string $callable
     */
    public function get(string $URI, string $callable): void
    {
        $route = RouteCreator::createRoute($URI, 'GET', $callable);
        $this->router->registerRoute($route);
    }

    /**
     * Creates a Post route.
     *
     * @param string $URI
     * @param string $content
     */
    public function post(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'POST', $content);
        $this->router->registerRoute($route);
    }

    /**
     * Creates a PUT route.
     *
     * @param string $URI
     * @param string $content
     */
    public function put(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'PUT', $content);
        $this->router->registerRoute($route);
    }

    /**
     * Creates a DELETE route.
     *
     * @param string $URI
     * @param string $content
     */
    public function delete(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'DELETE', $content);
        $this->router->registerRoute($route);
    }

    /**
     * Ends routing.
     *
     * @throws RouterException
     */
    public function done(): void
    {
        $this->router->resolve();
    }
}
