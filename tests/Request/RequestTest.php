<?php

declare(strict_types=1);

namespace Request;

use PHPUnit\Framework\TestCase;
use Sandbox\Exceptions\RequestException;
use Sandbox\Request\Request;


class RequestTest extends TestCase
{
    public function testConstruct()
    {
        $result = new Request('/', 'GET', [], []);
        $this->assertInstanceOf(Request::class, $result);
    }

    public function testGetQueryParam()
    {
        $sut = new Request('/', 'GET', ['test'=>'test'], []);
        $expected = 'test';
        $result = $sut->getQueryParam('test');
        $this->assertEquals($expected, $result);
    }

    public function testGetQueryParams()
    {
        $sut = new Request('/', 'GET', ['test'=>'test'], []);
        $expected = ['test' => 'test'];
        $result = $sut->getQueryParams();
        $this->assertEquals($expected, $result);
    }

    public function testGetQueryParamNotExist()
    {
        $sut = new Request('/', 'GET', ['test'=>'test'], []);
        $this->expectException(RequestException::class);
        $sut->getQueryParam('notfound');
    }

    public function testGetPostBodyItem()
    {
        $sut = new Request('/', 'GET', [], ['test'=>'test']);
        $expected = 'test';
        $result = $sut->getPostBodyItem('test');
        $this->assertEquals($expected, $result);
    }

    public function testGetPostBody()
    {
        $sut = new Request('/', 'GET', [], ['test'=>'test']);
        $expected = ['test'=>'test'];
        $result = $sut->getPostBody();
        $this->assertEquals($expected, $result);
    }

    public function testGetURI()
    {
        $sut = new Request('/', 'GET', [], []);
        $expected = '/';
        $result = $sut->getURI();
        $this->assertEquals($expected, $result);
    }

    public function testGetMethod()
    {
        $sut = new Request('/', 'GET', [], []);
        $expected = 'GET';
        $result = $sut->getMethod();
        $this->assertEquals($expected, $result);
    }

    public function testGetPostBodyItemNotExist()
    {
        $sut = new Request('/', 'GET', [], ['test'=>'test']);
        $this->expectException(RequestException::class);
        $sut->getPostBodyItem('notfound');
    }
}