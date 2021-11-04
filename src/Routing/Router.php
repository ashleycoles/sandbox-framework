<?php


namespace Sandbox\Routing;


use Sandbox\Request\Request;
use Sandbox\Response\ResponseHandler;

class Router
{
    protected Request $request;
    protected ResponseHandler $responseHandler;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request, ResponseHandler $responseHandler)
    {
        $this->request = $request;
        $this->responseHandler = $responseHandler;
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
        $this->responseHandler->setResponseContent($activeRoute->getContent())
            ->sendResponse();
    }
}