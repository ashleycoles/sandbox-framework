<?php

declare(strict_types=1);

namespace Sandbox\Response;


use Sandbox\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    protected array $headers;
    protected string $content;

    /**
     * Adds an individual header into the headers array
     * @param string $header
     * @return $this
     */
    public function setHeader(string $header): Response
    {
        $this->headers[] = $header;
        return $this;
    }

    /**
     * Sends all the request headers
     * @param string $headers
     */
    public function sendHeaders(): Response
    {
        foreach ($this->headers as $header) {
            header($header);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Response
     */
    public function setContent(string $content): Response
    {
        $this->content = $content;
        return $this;
    }
}