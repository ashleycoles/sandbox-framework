<?php


namespace Sandbox\Routing;


use Sandbox\Request\Request;
use Sandbox\Response\Response;

class RouteMethodSetter
{

    protected Response $response;
    protected Request $request;
    protected Router $router;

    /**
     * RouteMethodSetter constructor.
     * @param Response $response
     */
    public function __construct(Response $response, Request $request, Router $router)
    {
        $this->response = $response;
        $this->request = $request;
        $this->router = $router;
    }

    /**
     * Creates a GET route.
     * @param string $URI
     */
    public function get(string $URI, string $content): void
    {
        $route = RouteCreator::createRoute($URI, 'GET', $content);
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