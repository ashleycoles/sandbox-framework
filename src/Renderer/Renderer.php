<?php

declare(strict_types=1);

namespace Sandbox\Renderer;

use Sandbox\Exceptions\RendererException;

class Renderer
{
    protected string $templateDirectory;

    /**
     * Renderer constructor.
     *
     * @param string $templateDirectory
     */
    public function __construct(string $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    /**
     * Renders the given template.
     *
     * @param  string $templateName
     * @param  array  $content      of data - each key becomes a variable available in the template
     * @return string
     * @throws RendererException
     */
    public function renderTemplate(string $templateName, array $content): string
    {
        $templatePath = $this->templateDirectory . $templateName;
        if ($this->templateExists($templateName)) {
            try {
                ob_start();
                $this->includeTemplateWithDataScope($templatePath, $content);
                $output = ob_get_clean();
            } catch (\Exception $exception) {
                ob_end_clean();
                throw $exception;
            }
            return $output;
        } throw new RendererException('Requested template "' . $templateName . '" does not exist.');
    }

    /**
     * Checks a given template name to make sure it exists and is readable.
     *
     * @param string $templateName
     * @return bool
     */
    public function templateExists(string $templateName): bool
    {
        $templatePath = $this->templateDirectory . $templateName;
        return is_file($templatePath) && is_readable($templatePath);
    }

    protected function includeTemplateWithDataScope(string $template, array $data): void
    {
        extract($data);
        include func_get_arg(0);
    }
}
