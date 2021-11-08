<?php

namespace Sandbox\Interfaces;

use Sandbox\Exceptions\RequestException;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getURI(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array Containing GET data
     */
    public function getQueryParams(): array;

    /**
     * Returns a single query param by name
     *
     * @param  string $param
     * @return mixed
     * @throws RequestException
     */
    public function getQueryParam(string $param);

    /**
     * @return array Containing POST data
     */
    public function getPostBody(): array;

    /**
     * Returns a single item from post data by name
     *
     * @param  string $name
     * @throws RequestException
     */
    public function getPostBodyItem(string $name);
}
