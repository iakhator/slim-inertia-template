<?php

namespace InertiaAdapter;

use InertiaAdapter\Renderer\InertiaRenderer;
use InertiaAdapter\Response\InertiaResponse;

use Psr\Http\Message\ResponseInterface as Response;

class Inertia
{
    private static ?InertiaRenderer $renderer = null;
    private static ?InertiaResponse $response = null;

    public static function setUp(InertiaRenderer $renderer, InertiaResponse $response): void
    {
        self::$renderer = $renderer;
        self::$response = $response;
    }

    public static function render(Response $response, string $component, array $props = []): Response
    {
        if (!self::$renderer) {
            throw new \RuntimeException("Inertia renderer is not set. Call Inertia::setUp() first.");
        }
        return self::$renderer->render($response, $component, $props);
    }

    public static function redirect(string $url, string $component, array $props = []): InertiaResponse
    {
        if (!self::$response) {
            throw new \RuntimeException("Inertia response is not set. Call Inertia::setUp() first.");

        }
        return self::$response->redirect($url, $component, $props);
    }

    public static function share(array $props): void
    {
        if (!self::$renderer) {
            throw new \RuntimeException("Inertia renderer is not set. Call Inertia::setUp() first.");
        }
        self::$renderer->share($props);
    }
}
