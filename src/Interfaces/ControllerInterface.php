<?php

namespace Sandbox\Interfaces;

use Sandbox\Interfaces\RequestInterface as Request;
use Sandbox\Interfaces\ResponseInterface as Response;

interface ControllerInterface
{
    /**
     * @param  Request  $req
     * @param  Response $res
     * @return Response
     */
    public function __invoke(Request $req, Response $res): Response;
}
