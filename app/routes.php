<?php

use Slim\App;
use App\Controllers\HomeController;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    // $app->post('/submit', function ($request, $response, $args) {
    //     return Inertia::redirect('/thank-you');
    // });
};
