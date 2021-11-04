<?php


namespace Sandbox\Response;


class Response
{
    protected array $headers;
    protected string $content;

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