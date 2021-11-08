<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;
use Sandbox\Container\Container;
use Sandbox\Request\Request;
use Sandbox\Response\Response;
use Sandbox\Routing\Router;


class RouterTest extends TestCase
{
    public function testConstruct()
    {
        $mockRequest = $this->createMock(Request::class);
        $mockResponse = $this->createMock(Response::class);
        $mockContainer = $this->createMock(Container::class);

        $result = new Router($mockRequest, $mockResponse, $mockContainer);
        $this->assertInstanceOf(Router::class, $result);
    }
}