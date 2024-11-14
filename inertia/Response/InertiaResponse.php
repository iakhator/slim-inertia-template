<?php

namespace InertiaAdapter\Response;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;

class InertiaResponse extends Response
{
    public function redirect(string $url, int $status = 302): ResponseInterface
    {
        if (isset($_SERVER['HTTP_X_INERTIA'])) {
            return $this->withHeader('X-Inertia-Location', $url)->withStatus($status);
        } else {
            return $this->withHeader('Location', $url)->withStatus($status);
        }
    }
}
