<?php

declare(strict_types=1);

namespace Request;

use PHPUnit\Framework\TestCase;
use Sandbox\Exceptions\ResponseException;
use Sandbox\Response\Response;


class ResponseTest extends TestCase
{
    public function testConstruct()
    {
        $result = new Response();
        $this->assertInstanceOf(Response::class, $result);
    }

    public function testSetStatus()
    {
        $sut = new Response();
        $result = $sut->setStatus(404);
        $this->assertInstanceOf(Response::class, $result);
        // Check the status code was set correctly
        $this->assertEquals(http_response_code(), 404);
    }

    public function testSetStatusInvalid()
    {
        $sut = new Response();
        $this->expectException(ResponseException::class);
        $sut->setStatus(9000);
    }

    public function testSetContent()
    {
        $sut = new Response();
        $result = $sut->setContent('testing');
        $this->assertInstanceOf(Response::class, $result);
        $this->assertEquals('testing', $sut->getContent());
    }

    public function testSetHeader()
    {
        $sut = new Response();
        $result = $sut->setHeader('Content-Type: application/json');
        $this->assertInstanceOf(Response::class, $result);
    }

    public function testGetHeaders()
    {
        $sut = new Response();
        $result = $sut->setHeader('Content-Type: application/json');
        $headers = $result->getHeaders();

        $this->assertInstanceOf(Response::class, $result);
        $this->assertIsArray($headers);
        $this->assertContains('Content-Type: application/json', $headers);
        $this->assertCount(1, $headers);
    }
}