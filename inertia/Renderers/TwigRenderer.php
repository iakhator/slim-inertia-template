<?php

namespace InertiaAdapter\Renderers;

use Slim\Views\Twig;
use InertiaAdapter\Contracts\TemplateRendererInterface;

class TwigRenderer implements TemplateRendererInterface
{
    protected Twig $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function render(string $component, array $props = []): string
    {
        return $this->twig->fetch('app.twig', [
            'page' => [
                'component' => $component,
                'props' => $props,
                'url' => $_SERVER['REQUEST_URI']
            ]
        ]);
    }
}
