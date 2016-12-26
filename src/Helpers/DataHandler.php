<?php
    namespace Game\Helpers;

    /**
    */
    class DataHandler
    {
        public function generateNewSessionId()
        {
            date_default_timezone_set('GMT');
            $date = date_create();
            $timestamp = date_timestamp_get(date_create());

            var_dump(md5($timestamp+rand(0, 100000)));
        }
    }