<?php
    namespace Game\Views;

    /**
    * The application view
    */
    class View
    {
       public function render($template_file, array $vars = [])
       {
          ob_start();
          extract($vars);

          $template_file = __DIR__ . '/' . $template_file;

          require($template_file);
       }
    }