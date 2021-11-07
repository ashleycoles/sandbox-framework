<?php

declare(strict_types=1);


namespace Sandbox\Renderer;


use Sandbox\Interfaces\ResponseInterface;

class Renderer
{
    protected string $templateDirectory;

    /**
     * Renderer constructor.
     * @param string $templateDirectory
     */
    public function __construct(string $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function renderTemplate(string $templateName, array $content): string
    {

    }


}