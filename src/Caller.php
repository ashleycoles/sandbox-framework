<?php


namespace Sandbox;


use Sandbox\Interfaces\RequestInterface;
use Sandbox\Interfaces\ResponseInterface;
use Sandbox\Response\ResponseHandler;

class Caller
{
    /**
     * Calls a controller.
     * @param callable $callable
     * @param RequestInterface $request
     * @param ResponseHandler $responseHandler
     * @return ResponseInterface
     */
    public function callByName(callable $callable, RequestInterface $request, ResponseHandler $responseHandler): ResponseInterface
    {
        if (is_callable($callable)) {
            return $callable($request, $responseHandler->getResponse());
        }
    }
}