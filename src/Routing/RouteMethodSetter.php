<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\ResponseInterface;

class RouteMethodSetter
{

    protected ResponseInterface $response;
    protected RequestInterface $request;
    protected Router $router;

    /**
     * RouteMethodSetter constructor.
     * @param ResponseInterface $response
     * @param RequestInterface $request
     * @param Router $router
     */
    public function __construct(ResponseInterface $response, RequestInterface $request, Router $router)
    {
        $this->response = $response;
        $this->request = $request;
        $this->router = $router;
    }

    /**
     * Creates a GET route.
     * @param string $URI
     * @param callable $callable
     */
    public function get(string $URI, callable $callable): void
    {
        $route = RouteCreator::createRoute($URI, 'GET', $callable);
        $this->router->registerRoute($route);
    }

    /**
     * Creates a Post route.
     * @param string $URI
     */
    public function post(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'POST', $content);
        $this->router->registerRoute($route);
    }

    /**
     * Creates a PUT route.
     * @param string $URI
     */
    public function put(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'PUT', $content);
        $this->router->registerRoute($route);
    }

    /**
     * Creates a DELETE route.
     * @param string $URI
     */
    public function delete(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'DELETE', $content);
        $this->router->registerRoute($route);
    }

    /**
     * Ends routing.
     */
    public function done(): void
    {
        $this->router->resolve();
    }
}