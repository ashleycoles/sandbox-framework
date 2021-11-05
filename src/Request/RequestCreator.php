<?php

declare(strict_types=1);

namespace Sandbox\Request;


use Sandbox\Exceptions\RequestException;
use Sandbox\Interfaces\RequestInterface;

class RequestCreator
{
    /**
     * Public interface for generating a Request object.
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $uri = $this->getRequestURI();
        $method = $this->getRequestMethod();
        $queryParams = $this->getQueryParams();
        $postBody = $this->getPostBody();

        return new Request($uri, $method, $queryParams, $postBody);
    }

    /**
     * @return string
     * @throws RequestException
     */
    protected function getRequestURI(): string
    {
        if (!$_SERVER['REQUEST_URI']) throw new RequestException('Unable to get REQUEST_URI');
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    /**
     * @return string
     * @throws RequestException
     */
    protected function getRequestMethod(): string
    {
        if (!$_SERVER['REQUEST_METHOD']) throw new RequestException('Unable to get REQUEST_METHOD');
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return array $_GET superglobal copy
     */
    protected function getQueryParams(): array
    {
        return $_GET;
    }

    /**
     * @return array $_POST superglobal copy
     */
    protected function getPostBody(): array
    {
        return $_POST;
    }
}