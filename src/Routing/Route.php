<?php


namespace Sandbox\Routing;


use Sandbox\Interfaces\RouteInterface;

class Route implements RouteInterface
{
    protected string $URI;
    protected string $method;
    protected $callable;

    /**
     * Route constructor.
     * @param string $URI
     * @param string $method
     * @param string $callable
     */
    public function __construct(string $URI, string $method, string $callable)
    {
        $this->URI = $URI;
        $this->method = $method;
        $this->callable = $callable;
    }

    /**
     * @return string
     */
    public function getURI(): string
    {
        return $this->URI;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getCallable(): string
    {
        return $this->callable;
    }

}