<?php

use Sandbox\App\App;
use Sandbox\Caller;
use Sandbox\Container\Container;
use Sandbox\Response\ResponseCreator;
use Sandbox\Response\ResponseHandler;
use Sandbox\Routing\Router;
use TestApp\Controllers\TestController;

require_once '../vendor/autoload.php';

// Start dependencies
$container = new Container();

$container->add('RequestCreator', new \Sandbox\Factories\Request\RequestCreatorFactory());
$container->add('ResponseCreator', new \Sandbox\Factories\Response\ResponseCreatorFactory());


$requestCreator = $container->get('RequestCreator');
$responseCreator = $container->get('ResponseCreator');

$request = $requestCreator->createRequest();
$response = $responseCreator->createResponse();

$responseHandler = new ResponseHandler($response);

$caller = new Caller();

$router = new Router($request, $responseHandler, $caller);

$app = new App($response, $request, $router);




// Start routing
$app->get('/test', new TestController());

// End routing
$app->done();