<?php
    namespace Game\Controllers;

    /**
    * The home page controller
    */
    class Bee
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