<?php

declare(strict_types=1);

use Sandbox\App\App;
use Sandbox\Container\Container;
use Sandbox\Routing\Router;

require_once '../vendor/autoload.php';


// Start dependencies
$container = new Container();

$container->add('RequestCreator', new \Sandbox\Factories\Request\RequestCreatorFactory());
$container->add('Response', new \Sandbox\Factories\Response\ResponseFactory());
$container->add('ResponseHelper', new \Sandbox\Factories\Response\ResponseHelperFactory());
//TestApp dependencies
$container->add('TestController', new \TestApp\Factories\Controllers\TestControllerFactory());

$container->build();

//$response = $container->get('Response');
$response = $container->get('ResponseHelper');
$requestCreator = $container->get('RequestCreator');
$request = $requestCreator->createRequest();

$router = new Router($request, $response, $container);

$app = new App($response, $request, $router);


// Start routing
$app->post('/test', 'TestController');

// End routing
$app->done();

