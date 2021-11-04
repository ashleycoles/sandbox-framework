<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\RouteInterface;
use Sandbox\Response\ResponseHandler;

class Router
{
    protected RequestInterface $request;
    protected ResponseHandler $responseHandler;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request, ResponseHandler $responseHandler)
    {
        $this->request = $request;
        $this->responseHandler = $responseHandler;
    }

    /**
     * @param RouteInterface $route
     */
    public function registerRoute(RouteInterface $route): void
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