<?php
    namespace Game\Controllers;

    use Game\Models\Bee;

    /**
    * The application controller used to render page and
    * displaying messages
    */
    class GameController
    {
        protected $default_bee_counts = [
            'drone' => 8,
            'queen' => 1,
            'worker' => 5
        ];

        protected $colony = [];

        /**
         * Builds array containing "bee" data
         * @return $colony
         */
        protected function buildBees()
        {
            $i = 0;
            $id = 1;

            foreach ($this->default_bee_counts as $bee_type => $count) {
                while ($i < $count) {
                    $bee = new Bee($bee_type, $id);
                    // $colony[$bee_type][$id] = (array) $bee;
                    $this->colony[$id] = $bee;

                    $i++;
                    $id++;
                }

                $i = 0;
            }

            return $this->colony;
        }

        protected function damageBee(Bee $bee)
        {
            var_dump($bee->id);

            $bee->deductHP();

            if ($bee->getBeeHitpoints() <= 0) {
                unset($_SESSION['game_data'][$bee->id]);
            }

            // $_SESSION['game_data'][$bee->id] = $bee;

            echo '<br><br>';
            // echo '<pre>' . var_export($_SESSION['game_data']) . '</pre>';

            foreach ($_SESSION['game_data'] as $data) {
                echo '<pre>' . var_export((array) $data) . '</pre>';
            }

            // var_dump($_SESSION['game_data'][$type]);
            // var_dump($this->type_deduction[$type]);

            // $_SESSION['game_data'][$type][$id];
        }

        /**
         * Initiliazes session and game data
         */
        public function initializeGame()
        {
            if (isset($_SESSION)) {
                session_destroy();
            }
            session_start();



            if (isset($_POST['submit']) && $_POST['submit'] == 'hit') {
                $rand_id = array_rand($_SESSION['game_data']);
                $this->damageBee($_SESSION['game_data'][$rand_id]);

                // echo '<pre>' . var_export($_SESSION['game_data'][$rand_id], true) . '</pre>';
                // die();
            } else {
                $_SESSION = ['game_data' => $this->buildBees()];
            }

            // // echo '<pre>' . print_r($_SESSION['game_data']) . '</pre>';

            // echo '<pre>' . var_export($_SESSION['game_data'], true) . '</pre>';

            // die();

            // if (isset($_POST['submit']) && $_POST['submit'] == 'hit') {
            //     // $random_bee_type = array_rand($_SESSION['game_data']);

            //     // foreach ($_SESSION['game_data'] as $data) {
            //         echo "<br>data - <br><br>";
            //     //     var_export($data);
            //     // }

            //     // var_dump($_SESSION['game_data']);

            //     // $this->deductHitPoints(
            //     //     $random_bee_type,
            //     //     array_rand($_SESSION['game_data'][$random_bee_type])
            //     // );
            // }
        }
    }