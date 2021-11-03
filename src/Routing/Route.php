<?php


namespace Sandbox\Routing;


class Route
{
    protected string $URI;
    protected string $method;
    protected string $content;

    /**
     * Route constructor.
     * @param string $URI
     * @param string $method
     */
    public function __construct(string $URI, string $method, string $content)
    {
        $this->URI = $URI;
        $this->method = $method;
        $this->content = $content;
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
    public function getContent(): string
    {
        return $this->content;
    }

}