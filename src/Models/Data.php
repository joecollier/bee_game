<?php
    namespace Game\Models;

    /**
    * Model to represent the Bee object
    */
    class Data
    {
        protected $session_id;
        protected $continue_run = true;
        protected $bees = [
            'drones' => [],
            'queens' => [],
            'workers' => []
        ];

        function __construct()
        {
            $this->session_id = $this->setSessionid();

            var_dump('set');
            die();

            $this->continue_run = $this->setContinueRun($this->continue_run);
        }

        protected function setSessionid($session_id = null)
        {
            if (empty($session_id)) {
                $date = date_create();
                $timestamp = date_timestamp_get(date_create());

                $session_id = md5($timestamp+rand(0, 100000));
            }

            $this->session_id = $session_id;
        }

        protected function getSessionid()
        {
            return $this->session_id;
        }

        protected function setContinueRun($continue_run)
        {
            $this->continue_run = $continue_run;
        }

        protected function getContinueRun()
        {
            return $this->continue_run;
        }

        protected function getBees()
        {
            return $this->bees;
        }

        public function getBeeArray()
        {
            var_dump(3938, $this->getContinueRun());

            return [
                'session_id' => $this->getSessionid(),
                'continue_run' => $this->getContinueRun(),
                'bees' => $this->getBees()
            ];
        }

        public function convertBeeArrayToJson($bee_array)
        {
            var_dump(json_encode($bee_array));
        }
    }