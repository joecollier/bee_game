<?php
    namespace Game\Models;

    /**
    * The home page model
    */
    class Model
    {
        private $message = 'Welcome to Home page.';

        function __construct()
        {

        }

        public function displayMessage()
        {
            return $this->message;
        }
    }