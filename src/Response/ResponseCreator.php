<?php


namespace Sandbox\Response;


use Sandbox\Interfaces\ResponseInterface;

class ResponseCreator
{
    public function createResponse(): ResponseInterface
    {
        return new Response();
    }
}