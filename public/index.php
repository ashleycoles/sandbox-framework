<?php

use Sandbox\App\App;
use Sandbox\Request\RequestCreator;
use Sandbox\Response\ResponseCreator;
use Sandbox\Response\ResponseHandler;
use Sandbox\Routing\Router;

require_once '../vendor/autoload.php';

$requestCreator = new RequestCreator();
$request = $requestCreator->createRequest();


$response = ResponseCreator::createResponse();

$responseSender = new ResponseHandler($response);

$router = new Router($request, $responseSender);

$app = new App($response, $request, $router);

// Start routing
$app->get('/home', '{"msg":"Hello world"}');
$app->get('/test', '{"msg":"Does this actually work?"}');
$app->get('/', '{"msg":"Cool!"}');


// End routing
$app->done();