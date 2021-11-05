<?php


namespace Sandbox\Routing;


use Sandbox\Caller;
use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\RouteInterface;
use Sandbox\Response\ResponseHandler;

class Router
{
    protected RequestInterface $request;
    protected ResponseHandler $responseHandler;
    protected Caller $caller;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param RequestInterface $request
     * @param ResponseHandler $responseHandler
     * @param Caller $caller
     */
    public function __construct(RequestInterface $request, ResponseHandler $responseHandler, Caller $caller)
    {
        $this->request = $request;
        $this->responseHandler = $responseHandler;
        $this->caller = $caller;
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
    public function resolve(): void
    {
        $activeRoute = ActiveRouteResolver::resolveRoutes($this->routes, $this->request);
        if ($activeRoute) {
            $response = $this->caller->callByName($activeRoute->getCallable(), $this->request, $this->responseHandler);
            $response->sendHeaders();
            echo $response->getContent();
        } else {
            http_response_code(404);
        }

    }
}