<?php

namespace InertiaAdapter\Contracts;

interface TemplateRendererInterface
{
    public function render(string $component, array $props = []): string;
}
