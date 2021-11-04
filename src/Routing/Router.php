<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RequestInterface;
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