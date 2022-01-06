<?php

/** @var Router $router */

use App\Http\Controllers\ApiAuthController;
use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/api/register', [ApiAuthController::class, 'register']);
