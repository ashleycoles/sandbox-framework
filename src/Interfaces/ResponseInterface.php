<?php

namespace Sandbox\Interfaces;

interface ResponseInterface
{
    /**
     * Adds an individual header into the headers array
     * @param string $header
     * @return $this
     */
    public function setHeader(string $header): ResponseInterface;

    /**
     * Sends all the request headers
     * @param string $headers
     */
    public function sendHeaders(): ResponseInterface;

    /**
     * @return string
     */
    public function getContent(): string;

    /**
     * @param string $content
     * @return ResponseInterface
     */
    public function setContent(string $content): ResponseInterface;

    /**
     * @param int $status
     * @return ResponseInterface
     */
    public function setStatus(int $status): ResponseInterface;
}