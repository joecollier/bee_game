<?php
namespace Game\Helpers;

/**
 * Manipulates current game data in order to render values
 * needed by the View
 */
class DataHandler
{
    /**
     * Current counts for each by type
     * @var array $counts
     */
    public $counts = [
        'drone' => 0,
        'queen' => 0,
        'worker' => 0
    ];

    /**
     * Formats the data for use by the view class
     *
     * @param array $data
     * @return array|null
     */
    public function formatSessionData($data)
    {
        if (isset($data['game_data'])) {
            return $data['game_data'];
        }

        return null;
    }

    /**
     * Returns a count from the game data to keep track of
     * how many times the user has hit the submit button during
     * this current iteration of the game session
     *
     * @param array $data
     * @return int
     */
    public function getHitCount($data)
    {
        return $data['hit_count'];
    }

    /**
     * Returns an array containing an interger count
     * for each type of bee remaining
     *
     * @param array $game_data
     * @return array
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

    /**
     * Returns the type of the last bee to receive a hit
     * for UX purposes
     *
     * @param array $data
     * @return string|null
     */
    public function getLastHit($data)
    {
        return isset($data['last_hit_type'])
            ? $data['last_hit_type']
            : null;
    }
}
