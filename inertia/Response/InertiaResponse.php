<?php

namespace InertiaAdapter\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response;

class InertiaResponse extends Response
{
    public function redirect(string $url, int $status = 302): ResponseInterface
    {   

        if (isset($_SERVER['HTTP_X_INERTIA'])) {
            var_dump('I got here');
            return $this->withHeader('X-Inertia-Location', $url)->withStatus($status);
        } else {
            return $this->withHeader('Location', $url)->withStatus($status);
        }
    }

    public function direct(Response $response, string $url, string $component): ResponseInterface
    {
        
        if (isset($_SERVER['HTTP_X_INERTIA'])) {
            $payload = [
                'component' => $component, 
                // 'props' => array_merge(self::$sharedProps, $props),
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
