<?php

namespace Sandbox\Interfaces;

use Sandbox\Response\Response;

interface ResponseInterface
{
    /**
     * Adds an individual header into the headers array
     * @param string $header
     * @return $this
     */
    public function setHeader(string $header): Response;

    /**
     * Sends all the request headers
     * @param string $headers
     */
    public function sendHeaders(): Response;

    /**
     * @return string
     */
    public function getContent(): string;

    /**
     * @param string $content
     * @return Response
     */
    public function setContent(string $content): Response;
}