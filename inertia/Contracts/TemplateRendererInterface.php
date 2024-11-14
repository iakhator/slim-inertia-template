<?php

namespace InertiaAdapter\Contracts;

use Psr\Http\Message\ResponseInterface as Response;

interface TemplateRendererInterface
{
    public function render(Response $response, string $component, array $props = []): Response;
}
