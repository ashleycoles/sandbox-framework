<?php

declare(strict_types=1);

namespace TestApp\Controllers;


use Sandbox\Interfaces\ControllerInterface;
use Sandbox\Interfaces\RequestInterface as Request;
use Sandbox\Interfaces\ResponseInterface as Response;
use Sandbox\Renderer\Renderer;

class TestController implements ControllerInterface
{

    protected Renderer $renderer;

    /**
     * TestController constructor.
     * @param Renderer $renderer
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }


    /**
     * @param Request $req
     * @param Response $res
     * @return Response
     */
    public function __invoke(Request $req, Response $res): Response
    {
        $content = $this->renderer->renderTemplate('Home.phtml',['test' => 'Hello World']);

        $res->setContent($content);
        return $res;

    }
}