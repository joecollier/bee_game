<?php
    namespace Game\Models;

    /**
    * The application model needed to render page
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