<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Sandbox\Routing\Route;
use Sandbox\Routing\RouteCreator;

class RouteCreatorTest extends TestCase
{
    public function testCreateRoute()
    {
        $result = RouteCreator::createRoute('/test', 'GET', 'TestController');
        $this->assertInstanceOf(Route::class, $result);
        $this->assertObjectHasAttribute('URI', $result);
        $this->assertObjectHasAttribute('method', $result);
        $this->assertObjectHasAttribute('callable', $result);
    }

    public function testCreateRouteMalformed()
    {
        $this->expectException(TypeError::class);
        RouteCreator::createRoute(['/test'], ['GET'], ['TestController']);
    }

}