<?php

namespace InertiaAdapter\Renderers;

use Slim\Views\Twig;
use InertiaAdapter\Contracts\TemplateRendererInterface;

use Psr\Http\Message\ResponseInterface as Response;

class TwigRenderer implements TemplateRendererInterface
{
    protected Twig $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function render(Response $response, string $component, array $props = []): Response
    {

      $pageData = [
        'component' => $component,
        'props' => $props,
        'url' => $_SERVER['REQUEST_URI'],
        'version' => '1.0'
    ];

        return $this->twig->render($response, 'app.html.twig', [
            'page' => json_encode($pageData)
        ])->withHeader('X-Inertia', 'true');
    }
}
