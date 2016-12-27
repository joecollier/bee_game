<?php
    namespace Game\Helpers;

    /**
     * Manipulates current game data in order to render values
     * needed by the View
     */
    class DataHandler
    {
        public $counts = [
            'drone' => 0,
            'queen' => 0,
            'worker' => 0
        ];

        /**
         * [formatSessionData description]
         * @param  [type] $data [description]
         * @return [type]       [description]
         */
        public function formatSessionData($data)
        {
            if (isset($data['game_data'])) {
                return $data['game_data'];
            }

            return null;
        }

        /**
         * [getHitCount description]
         * @param  [type] $data [description]
         * @return [type]       [description]
         */
        public function getHitCount($data)
        {
            return $data['hit_count'];
        }

        /**
         * [getCounts description]
         * @param  [type] $game_data [description]
         * @return [type]            [description]
         */
        public function getCounts($game_data)
        {
            if (!empty($game_data)) {
                foreach ($game_data as $data) {
                    $this->counts[$data->type]++;
                }
            }

            return $this->counts;
        }
    }