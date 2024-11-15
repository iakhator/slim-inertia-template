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

    public function dashboard(Request $request, Response $response): Response
    {
        $props = [
            'name' => 'Slim User Dashboard'
        ];

        return Inertia::render($response, 'Dashboard', $props);
        // $response->getBody()->write($html);

        // var_dump($response);
        // return $response;
    }

    public function login(Request $request, Response $response): Response
    {
      //  var_dump(json_decode($request->getBody()->getContents(), true));
      //  return Inertia::redirect('/dashboard', 303);
       return Inertia::direct($response, '/dashboard');
    }
}
