<?php


namespace Sandbox\Response;


use Sandbox\Interfaces\ResponseInterface;

// TODO: Any point in keeping this?
// Still can't decide
class ResponseCreator
{
    public function createResponse(): ResponseInterface
    {
        return new Response();
    }
}