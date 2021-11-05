<?php

declare(strict_types=1);

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