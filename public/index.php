<?php


use Sandbox\App\App;
use Sandbox\Request\RequestCreator;
use Sandbox\Response\ResponseCreator;
use Sandbox\Routing\Router;

require_once '../vendor/autoload.php';

$requestCreator = new RequestCreator();
$request = $requestCreator->createRequest();


$responseCreator = new ResponseCreator();
$response = $responseCreator->createResponse();

$router = new Router($request, $response);

$app = new App($response, $request, $router);

// Start routing
$app->get('/home', '{"msg":"Hello world"}');
$app->get('/test', '{"msg":"Does this actually work?"}');
$app->get('/', '{"msg":"Cool!"}');


// End routing
$app->done();