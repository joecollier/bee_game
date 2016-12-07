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

            print "Home - ";
        }

        public function index()
        {
            return $this->controller->render();
        }
    }