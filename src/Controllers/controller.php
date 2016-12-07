<?php
    namespace Game\Controllers;

    /**
    * The application controller used to render page and
    * displaying messages
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