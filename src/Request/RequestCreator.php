<?php


namespace Sandbox\Request;

// TODO: Better as statics?
class RequestCreator
{
    /**
     * Public interface for generating a Request object.
     * @return Request
     */
    public function createRequest(): Request
    {
        $uri = $this->getRequestURI();
        $method = $this->getRequestMethod();

        return new Request($uri, $method);
    }

    /**
     * @return string|null
     */
    protected function getRequestURI(): ?string
    {
        // TODO: What if it is null?
        return $_SERVER['REQUEST_URI'] ?? null;
    }

    /**
     * @return string|null
     */
    protected function getRequestMethod(): ?string
    {
        // TODO: What if it is null?
        return $_SERVER['REQUEST_METHOD'] ?? null;
    }
}