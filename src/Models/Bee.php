<?php
    namespace Game\Models;

    /**
    * Model to represent the Bee object
    */
    class Bee
    {
        public $type;
        public $id;
        public $hitpoints;
        protected $damage_by_type = [
            'queen' => 80,
            'drone' => 50,
            'worker' => 100
        ];

        /**
         * [__construct description]
         * @param string  $type      [description]
         * @param integer $id        [description]
         * @param integer $hitpoints [description]
         */
        public function __construct($type = 'drone', $id = 0, $hitpoints = -1)
        {
            $this->setBeeType($type);
            $this->setBeeId($id);
            $this->setBeeHitpoints($hitpoints, $type);
        }

        /**
         * Type of bee object
         *
         * @param string $type
         */
        protected function setBeeType($type)
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
         * Type of bee object
         *
         * @param string $type
         */
        protected function setBeeId($id)
        {
            $this->id = $id;
        }

        /**
         * @return $type
         */
        public function getBeeId()
        {
            return $this->id;
        }

        protected function getDefaultHitpointsByType($type)
        {
            $hitpoints_by_type = [
                'drone' => 75,
                'queen' => 100,
                'worker' => 50
            ];

            return $hitpoints_by_type[$type];
        }

        /**
         * Type of bee object
         *
         * @param string $type
         */
        public function setBeeHitpoints($hitpoints = null, $type = null)
        {
            if ($hitpoints >= 0) {
                $this->hitpoints = $hitpoints;
            } else {
                $this->hitpoints = $this->getDefaultHitpointsByType($type);
            }
        }

        /**
         * @return $type
         */
        public function getBeeHitpoints()
        {
            return $this->hitpoints;
        }

        public function deductHP()
        {
            $new_hp = $this->getBeeHitpoints() - $this->damage_by_type[$this->getBeeType()];
            $new_hp = ($new_hp > 0)
                ? $new_hp
                : 0;

            $this->setBeeHitpoints($new_hp);
        }
    }