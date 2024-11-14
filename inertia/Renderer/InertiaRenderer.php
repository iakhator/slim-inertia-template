<?php

namespace InertiaAdapter\Renderer;

use InertiaAdapter\Contracts\TemplateRendererInterface;

class InertiaRenderer
{
    protected TemplateRendererInterface $templateEngine;
    protected array $sharedProps = [];

    public function __construct(TemplateRendererInterface $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    public function render(string $component, array $props = []): string
    {
        $finalProps = array_merge($this->sharedProps, $props);
        return $this->templateEngine->render($component, $finalProps);
    }

    public function share(array $props): void
    {
        $this->sharedProps = array_merge($this->sharedProps, $props);
    }
}
