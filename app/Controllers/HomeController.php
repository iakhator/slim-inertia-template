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
    }

    public function dashboard(Request $request, Response $response): Response
    {
        $props = [
            'name' => 'Slim User Dashboard'
        ];

        return Inertia::render($response, 'Dashboard', $props);
    }

    public function login(Request $request): Response
    {

       return Inertia::redirect('/dashboard', 'Dashboard');
    }
}
