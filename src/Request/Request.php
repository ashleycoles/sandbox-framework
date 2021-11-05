<?php


namespace Sandbox\Request;


use Sandbox\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    protected string $URI;
    protected string $method;
    protected array $queryParams;
    protected array $postBody;

    /**
     * Request constructor.
     * @param string $URI
     * @param string $method
     * @param array $queryParams
     * @param array $postBody
     */
    public function __construct(string $URI, string $method, array $queryParams, array $postBody)
    {
        $this->URI = $URI;
        $this->method = $method;
        $this->queryParams = $queryParams;
        $this->postBody = $postBody;
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
     * @return array Containing GET data
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * @return array Containing POST data
     */
    public function getPostBody(): array
    {
        return $this->postBody;
    }
}