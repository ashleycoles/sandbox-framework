<?php

declare(strict_types=1);

namespace Sandbox\Routing;


use Sandbox\Interfaces\RouteInterface;

class Route implements RouteInterface
{
    protected string $URI;
    protected string $method;
    protected $callable;

    /**
     * Route constructor.
     * @param string $URI The route URI
     * @param string $method A valid HTTP request method
     * @param string $callable A DIC key
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