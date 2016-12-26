<?php
    namespace Game\Controllers;

    /**
    * The application controller used to render page and
    * displaying messages
    */
    class BeeController
    {
        protected $damage_per_type = [
            'drone' => 12,
            'queen' => 8,
            'worker' => 10
        ];

        protected $count_per_type = [
            'drone' => 8,
            'queen' => 1,
            'worker' => 5
        ];

        function __construct($bee)
        {
            $this->bee = $bee;
        }

        /**
         * Deducts hitpoints from Bee Object's total (current) hitpoints
         */
        public function hitBee()
        {
            $new_hitpoints =
                $this->bee->getBeeHitpoints() - $this->damage_per_type[$this->bee->type];

            $this->bee->setBeeHitpoints($new_hitpoints);
        }
    }