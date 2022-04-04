<?php

declare(strict_types=1);

namespace Sandbox\Response;

use Sandbox\Exceptions\ResponseException;
use Sandbox\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    protected array $headers = [];
    protected string $content;

    /**
     * Adds an individual header into the headers array
     *
     * @param  string $header
     * @return $this
     */
    public function setHeader(string $header): ResponseInterface
    {
        $this->headers[] = $header;
        return $this;
    }

    /**
     * Sends all the request headers
     *
     * @return ResponseInterface
     */
    public function sendHeaders(): ResponseInterface
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
     * @param  string $content
     * @return ResponseInterface
     */
    public function setContent(string $content): ResponseInterface
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param int $status
     * @return ResponseInterface
     * @throws ResponseException
     */
    public function setStatus(int $status = 200): ResponseInterface
    {
        $this->assertStatusRange($status);
        http_response_code($status);
        return $this;
    }

    /**
     * Ensures the provide status code is valid.
     *
     * @param int $status
     * @throws ResponseException
     */
    protected function assertStatusRange(int $status): void
    {
        if ($status < 100 || $status >= 600) {
            throw new ResponseException('Status code must be an integer between 1xx and 5xx');
        }
    }
}
