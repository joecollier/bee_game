<?php
    namespace Game\Controllers;

    /**
    * The bee object
    */
    class Bee
    {
        public function __construct()
        {
            $this->setBeeType();
        }

        /**
         * Type of bee object
         *
         * @param string $type
         */
        protected function setBeeType($type = 'drone')
        {
            $this->type = $type;
        }

        /**
         * @return $type
         */
        public function getBeeType()
        {
            return $this->type;
        }

        /**
         * Returns the unique id of the bee
         *
         * @return int $id
         */
        public function getUniqueId()
        {

        }

        /**
         * Returns integer denoting the current health status of the bee
         *
         * @return int $points
         */
        public function getCurrentHitPoints()
        {

        }
    }