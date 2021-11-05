<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\ContainerInterface;
use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\RouteInterface;
use Sandbox\Response\ResponseHandler;

class Router
{
    protected RequestInterface $request;
    protected ResponseHandler $responseHandler;
    protected ContainerInterface $container;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param RequestInterface $request
     * @param ResponseHandler $responseHandler
     * @param ContainerInterface $container
     */
    public function __construct(RequestInterface $request, ResponseHandler $responseHandler, ContainerInterface $container)
    {
        $this->request = $request;
        $this->responseHandler = $responseHandler;
        $this->container = $container;
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
            $controller = $this->container->get($activeRoute->getCallable());
            $response = $controller($this->request, $this->responseHandler->getResponse());
            echo $response->sendHeaders()->getContent();
        } else {
            http_response_code(404);
        }
    }
}