<?php


namespace Sandbox\Request;


use Sandbox\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    protected string $URI;
    protected string $method;

    /**
     * Request constructor.
     * @param string $URI
     */
    public function __construct(string $URI, string $method)
    {
        $this->URI = $URI;
        $this->method = $method;
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
}