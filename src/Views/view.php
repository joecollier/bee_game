<?php
    namespace Game\Views;

    /**
    * The application view
    */
    class View
    {
        private $controller;

        function __construct($controller)
        {
            $this->controller = $controller;

            $this->displayPage();
        }

        public function displayPage()
        {
            $template = __DIR__ . '/index.html.php';
            echo file_get_contents($template);
        }
    }