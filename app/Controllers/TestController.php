<?php

declare(strict_types=1);

namespace TestApp\Controllers;


use Sandbox\Interfaces\ControllerInterface;
use Sandbox\Interfaces\RequestInterface as Request;
use Sandbox\Interfaces\ResponseInterface as Response;

class TestController implements ControllerInterface
{
    /**
     * @param Request $req
     * @param Response $res
     * @return Response
     */
    public function __invoke(Request $req, Response $res): Response
    {
        $postData = json_encode($req->getPostBody());
        $getData = json_encode($req->getQueryParams());
        return $res->setHeader('Content-Type: application/json')
            ->setContent('{
            "msg": "Odds on?",
            "postData":' . $postData . ',
            "getData":' . $getData . '}');
    }
}