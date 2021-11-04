<?php

namespace Sandbox\Interfaces;

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
}