<?php

use Sandbox\App\App;
use Sandbox\Caller;
use Sandbox\Request\RequestCreator;
use Sandbox\Response\ResponseCreator;
use Sandbox\Response\ResponseHandler;
use Sandbox\Routing\Router;
use TestApp\Controllers\TestController;

require_once '../vendor/autoload.php';

$requestCreator = new RequestCreator();
$responseCreator = new ResponseCreator();

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