<?php
    namespace Game\Controllers;

    /**
    * The application controller used to render page and
    * displaying messages
    */
    class DisplayController
    {
        private $model;

        function __construct($model)
        {
            $this->model = $model;
        }
    }