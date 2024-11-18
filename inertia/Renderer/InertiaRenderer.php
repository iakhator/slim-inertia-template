<?php

namespace InertiaAdapter\Renderer;

use InertiaAdapter\Contracts\TemplateRendererInterface;

use Psr\Http\Message\ResponseInterface as Response;

class InertiaRenderer
{
    protected TemplateRendererInterface $templateEngine;
    protected array $sharedProps = [];

    public function __construct(TemplateRendererInterface $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    public function render(Response $response, string $component, array $props = []): Response
    {
        $finalProps = array_merge($this->sharedProps, $props);
        return $this->templateEngine->render($response, $component, $finalProps);
    }

    public function share(array $props): void
    {
        $this->sharedProps = array_merge($this->sharedProps, $props);
    }

    public function getSharedProps(): array
    {
        return $this->sharedProps;
    }
}
