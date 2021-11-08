<?php

declare(strict_types=1);


namespace Sandbox\Renderer;


use Sandbox\Exceptions\RendererException;
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

    /**
     * Renders the given template.
     * @param string $templateName
     * @param array $content of data - each key becomes a variable available in the template
     * @return string
     * @throws RendererException
     */
    public function renderTemplate(string $templateName, array $content): string
    {
        $templatePath = $this->templateDirectory . $templateName;
        extract($content);
        if (file_exists($templatePath)) {
            ob_start();
            require_once ($templatePath);
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        } throw new RendererException('Requested template does not exist.');
    }
}