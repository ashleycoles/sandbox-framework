<?php


namespace TestApp\Controllers;


use Sandbox\Interfaces\RequestInterface as Request;
use Sandbox\Interfaces\ResponseInterface as Response;

class TestController
{
    /**
     * @param Request $req
     * @param Response $res
     * @return Response
     */
    public function __invoke(Request $req, Response $res): Response
    {
        return $res->setHeader('Content-Type: application/json')
            ->setContent('{"msg": "Odds on?"}');
    }
}