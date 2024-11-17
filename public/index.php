<?php
use Dotenv\Dotenv;

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Twig\TwigFunction;
use InertiaAdapter\InertiaFactory;
use InertiaAdapter\Renderers\TwigRenderer;
use InertiaAdapter\Inertia;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/helpers.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = new Container();
AppFactory::setContainer($container);

$app = AppFactory::create();

// Set up Twig for rendering and add it to the container
$twig = Twig::create(__DIR__ . '/../src/views', ['cache' => false]);
$container->set(Twig::class, $twig); // Register Twig in the container first

$twig->getEnvironment()->addFunction(new TwigFunction('vite', function ($asset) {
    return vite($asset);
}));


// Add global environment variables to Twig
$container->get(Twig::class)->getEnvironment()->addGlobal('app', [
    'environment' => $_ENV['APP_ENV'] ?? 'production',
    'debug' => $_ENV['APP_DEBUG'] ?? false,
    'left' => 'left',
]);

// Initialize Inertia with the Twig renderer
$twigRenderer = new TwigRenderer($twig);
InertiaFactory::initialize($twigRenderer, $app);

// // Share common props across all pages
// Inertia::share([
//     'appName' => 'My Vue App',
//     'user' => [
//         'name' => 'John Doe',
//         'role' => 'Admin'
//     ],
// ]);

// Load routes
(require __DIR__ . '/../app/routes.php')($app);

// Run the app
$app->run();
