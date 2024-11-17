<?php

namespace InertiaAdapter;

use InertiaAdapter\Contracts\TemplateRendererInterface;
use InertiaAdapter\Renderer\InertiaRenderer;
use InertiaAdapter\Response\InertiaResponse;
use InertiaAdapter\Middleware\InertiaShared;
use Slim\App;


class InertiaFactory
{
    public static function initialize(TemplateRendererInterface $templateRenderer, App $app): void
    {
        $inertiaRenderer = new InertiaRenderer($templateRenderer);
        $inertiaResponse = new InertiaResponse();

        Inertia::setUp($inertiaRenderer, $inertiaResponse);

        $app->add(new InertiaShared());

    }
}
