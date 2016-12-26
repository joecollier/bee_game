<?php
    namespace Game\Views;

    /**
    * The application view
    */
    class View
    {
        private $model;
        private $controller;

        function __construct($controller, $model)
        {
            $this->controller = $controller;
            $this->model = $model;

            $this->displayPage();
        }

        public function displayPage()
        {
            $template = __DIR__ . '/index.html';
            echo file_get_contents($template);
        }
    }