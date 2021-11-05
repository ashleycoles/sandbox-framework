<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Sandbox\Routing\Route;

class RouteTest extends TestCase
{
    public function testConstruct()
    {
        $result = new Route('/', 'GET', 'test');
        $this->assertInstanceOf(Route::class, $result);
    }

    public function testConstructMalforded()
    {
        $this->expectException(TypeError::class);
        new Route(['/'], 12, false);
    }

    public function testGetURI()
    {
        $sut = new Route('/', 'GET', 'test');
        $result = $sut->getURI();
        $this->assertEquals($result, '/');
    }
}