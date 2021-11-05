<?php


namespace Sandbox\Request;


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
     * @return string|null
     */
    protected function getRequestURI(): ?string
    {
        // TODO: What if it is null?
        return $_SERVER['REQUEST_URI'] ? strtok($_SERVER['REQUEST_URI'], '?') : null;
    }

    /**
     * @return string|null
     */
    protected function getRequestMethod(): ?string
    {
        // TODO: What if it is null?
        return $_SERVER['REQUEST_METHOD'] ?? null;
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