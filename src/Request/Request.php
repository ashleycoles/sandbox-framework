<?php

declare(strict_types=1);

namespace Sandbox\Request;


use Sandbox\Exceptions\RequestException;
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
     * Returns a single query param by name
     * @param string $param
     * @return mixed
     * @throws RequestException
     */
    public function getQueryParam(string $param)
    {
        if (!array_key_exists($param, $this->queryParams)) throw new RequestException('Request query param not found');
        return $this->queryParams[$param];
    }

    /**
     * @return array Containing POST data
     */
    public function getPostBody(): array
    {
        return $this->postBody;
    }

    /**
     * Returns a single item from post data by name
     * @param string $name
     * @throws RequestException
     */
    public function getPostBodyItem(string $name)
    {
        if (!array_key_exists($name, $this->postBody)) throw new RequestException('Request post data not found');
    }
}