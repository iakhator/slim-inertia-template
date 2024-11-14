<?php

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use InertiaAdapter\Inertia;

class HomeController
{
    public function index(Request $request, Response $response): Response
    {
        $props = [
            'name' => 'Slim User'
        ];

        return Inertia::render($response, 'App', $props);
        // $response->getBody()->write($html);

        // var_dump($response);
        // return $response;
    }
}
