<?php

namespace Sandbox\Interfaces;

interface RouteInterface
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
     * @return string
     */
    public function getContent(): string;
}