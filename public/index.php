<?php

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use InertiaAdapter\InertiaFactory;
use InertiaAdapter\Renderers\TwigRenderer;
use InertiaAdapter\Inertia;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Set up Twig for rendering
$twig = Twig::create(__DIR__ . '/../src/views');
$twigRenderer = new TwigRenderer($twig);

// Initialize Inertia
InertiaFactory::initialize($twigRenderer);

// Share common props across all pages
Inertia::share([
    'appName' => 'My Vue App',
    'user' => [
        'name' => 'John Doe',
        'role' => 'Admin'
    ],
]);

// Include routes from a separate file

// Load routes
(require __DIR__ . '/../app/routes.php')($app);

// Run the app
$app->run();
