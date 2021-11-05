<?php


namespace Sandbox\Response;


use Sandbox\Interfaces\ResponseInterface;

// TODO: Any point in keeping this?
class ResponseCreator
{
    public function createResponse(): ResponseInterface
    {
        return new Response();
    }
}