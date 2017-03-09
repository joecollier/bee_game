<?php
namespace Game\Controllers;

use Game\Models\Bee;

/**
* The application controller used to render page and
* displaying messages
*/
class GameController
{
    /**
     * Game Controller Constructor
     * @param array $config
     */
    public function __construct($config = null)
    {
        $this->config = $config;
    }

    /**
     * Builds array containing bee objects
     */
    public function buildBees()
    {
        $i = 0;
        $id = 1;

        foreach ($this->config as $bee_type => $bee) {
            $count = $bee['count'];

            while ($i < $count) {
                $bee = new Bee($this->config, $bee_type, $id);
                $this->colony[$id] = $bee;

                $i++;
                $id++;
            }

            $i = 0;
        }

        return $this->colony;
    }

    /**
     * Clears session when the game ends
     */
    protected function endGame()
    {
        unset($_SESSION['game_data']);
    }

    /**
     * Deducts HP and updates game data.
     * Ends the game if the queen is dead
     *
     * @param Bee $bee
     */
    public function damageBee(Bee $bee)
    {
        $bee->deductHP();
        $_SESSION['last_hit_type'] = $bee->type;

        if ($bee->getBeeHitpoints() <= 0) {
            unset($_SESSION['game_data'][$bee->id]);

            if ($bee->type == 'queen') {
                $this->endGame();
            }
        }
    }

    /**
     * Builds new game data if new game session. Hits random bee
     * and updates data if not
     */
    protected function nextStep()
    {
        if (isset($_SESSION['game_data']) &&
            isset($_POST['submit']) &&
            $_POST['submit'] == 'hit'
        ) {
            $rand_id = array_rand($_SESSION['game_data']);
            $this->damageBee($_SESSION['game_data'][$rand_id]);
            $_SESSION['hit_count']++;
        } else {
            $_SESSION = ['game_data' => $this->buildBees(), 'hit_count' => 0];
        }
    }

    /**
     * Initiliazes session and game data
     */
    public function initializeGame()
    {
        if (isset($_SESSION)) {
            session_destroy();
            $_SESSION['hit_count'] = 0;
        }
        session_start();

        $this->nextStep();
    }
}
