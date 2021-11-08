<?php

use Sandbox\App\App;

return function (App $app) {
    // Start routing
    $app->get('/test', 'TestController');

};