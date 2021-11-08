<?php

declare(strict_types=1);

use Sandbox\App\App;
use Sandbox\Container\Container;
use Sandbox\Routing\Router;

require_once '../vendor/autoload.php';



// Start dependencies
$container = new Container();

$dependencies = require_once '../src/Settings/dependencies.php';
$dependencies($container);
//TestApp dependencies
$appDependencies = require_once '../app/Settings/dependencies.php';
$appDependencies($container);

//$response = $container->get('Response');
$response = $container->get('ResponseHelper');
$requestCreator = $container->get('RequestCreator');
$request = $requestCreator->createRequest();

$router = new Router($request, $response, $container);
$app = new App($response, $request, $router);

$routes = require_once '../app/Settings/routes.php';
$routes($app);

// End routing
$app->done();

