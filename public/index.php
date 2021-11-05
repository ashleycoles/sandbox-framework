<?php

use Sandbox\App\App;
use Sandbox\Container\Container;
use Sandbox\Routing\Router;

require_once '../vendor/autoload.php';


// Start dependencies
$container = new Container();

$container->add('RequestCreator', new \Sandbox\Factories\Request\RequestCreatorFactory());
$container->add('ResponseCreator', new \Sandbox\Factories\Response\ResponseCreatorFactory());
//TestApp dependencies
$container->add('TestController', new \TestApp\Factories\Controllers\TestControllerFactory());

$container->build();

$requestCreator = $container->get('RequestCreator');
$responseCreator = $container->get('ResponseCreator');

$request = $requestCreator->createRequest();
$response = $responseCreator->createResponse();


$router = new Router($request, $response, $container);

$app = new App($response, $request, $router);


// Start routing
$app->post('/test', 'TestController');

// End routing
$app->done();

