<?php


namespace Sandbox\Response;


use Sandbox\Interfaces\ResponseInterface;

class ResponseCreator
{
    static public function createResponse(): ResponseInterface
    {
        return new Response();
    }
}