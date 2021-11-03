<?php


namespace Sandbox\Routing;


use Sandbox\Request\Request;
use Sandbox\Response\Response;

class Router
{
    protected Request $request;
    protected Response $response;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param Route $route
     */
    public function registerRoute(Route $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * Finishes up routing.
     */
    public function resolve()
    {
        $activeRoute = ActiveRouteResolver::resolveRoutes($this->routes, $this->request);
        $this->response->setContent($activeRoute->getContent());
        $this->response->setContentType('application/json');

        // TODO: This stuff shouldn't be here - maybe a ResponseSender
        header('Content-Type: ' . $this->response->getContentType());
        echo $this->response->getContent();
    }
}