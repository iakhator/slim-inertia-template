<?php

use Slim\App;
use App\Controllers\HomeController;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/dashboard', [HomeController::class, 'dashboard']);
    $app->post('/login', [HomeController::class, 'login']);
};
