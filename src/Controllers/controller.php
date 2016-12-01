<?php
    namespace Game\Controllers;

    /**
    * The home page controller
    */
    class Controller
    {
        private $model;

        function __construct($model)
        {
            $this->model = $model;
        }

        public function render()
        {
            return $this->model->displayMessage();
        }
    }