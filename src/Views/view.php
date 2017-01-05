<?php
namespace Game\Views;

/**
* The application view
*/
class View
{
    /**
     * Renders data for browser
     *
     * @param string $template_file path to template file
     * @param array  $vars          array of variables used by template
     */
    public function render($template_file, array $vars = [])
    {
        ob_start();
        extract($vars);

        $template_file = __DIR__ . '/' . $template_file;

        require($template_file);
    }
}
