<?php

namespace InertiaAdapter\Response;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;
use InertiaAdapter\Renderer\InertiaRenderer;

class InertiaResponse extends Response
{

    private InertiaRenderer $renderer;

    public function __construct(InertiaRenderer $renderer) 
    {
        parent::__construct();
        $this->renderer = $renderer;
    }

    public function redirect(string $url, string $component, array $props = []): ResponseInterface
    {
        
        if (isset($_SERVER['HTTP_X_INERTIA'])) {
            $sharedProps = $this->renderer->getSharedProps();
            $payload = [
                'component' => $component, 
                'props' => array_merge($sharedProps, $props),
                'url' => $url,
                'version' => '1.0',
            ];

            $this->getBody()->write(json_encode($payload));


            return $this
                ->withHeader('X-Inertia', 'true')
                ->withHeader('X-Inertia-Location', $url)
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(303);
        }

        // If it’s not an Inertia request, perform a standard Slim redirect with 302 status
        return $this
            ->withHeader('Location', $url)
            ->withStatus(302);
    }
}
