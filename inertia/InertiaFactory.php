<?php

namespace InertiaAdapter;

use InertiaAdapter\Contracts\TemplateRendererInterface;
use InertiaAdapter\Renderer\InertiaRenderer;
use InertiaAdapter\Response\InertiaResponse;

class InertiaFactory
{
    public static function initialize(TemplateRendererInterface $templateRenderer): void
    {
        $inertiaRenderer = new InertiaRenderer($templateRenderer);
        $inertiaResponse = new InertiaResponse();

        Inertia::setUp($inertiaRenderer, $inertiaResponse);

    }
}
