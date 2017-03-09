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
    protected $counts = [
        'drone' => 0,
        'queen' => 0,
        'worker' => 0
    ];

    /**
     * Returns a count from the game data to keep track of
     * how many times the user has hit the submit button during
     * this current iteration of the game session
     *
     * @param array $data
     * @return int
     */
    protected function getHitCount($data)
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
    protected function getCounts($game_data)
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
    protected function getLastHit($data)
    {
        return isset($data['last_hit_type'])
            ? $data['last_hit_type']
            : null;
    }

    /**
     * Builds data array containing filenames for be images
     *
     * @return array
     */
    protected function getBeeImageAssetData()
    {
        return [
            'drone' => 'drone.jpg',
            'queen' => 'queen.jpg',
            'worker' => 'worker.jpg'
        ];
    }

    /**
     * Formats the data for use by the view class
     *
     * @param array $data
     * @return array
     */
    public function formatSessionData($data)
    {
        if (isset($data['game_data'])) {
            return $data['game_data'];
        }

        return [];
    }

    /**
     * Returns data params for template
     *
     * @param array $game_data
     * @param array $session_data
     * @return array $data
     */
    public function getDataForTemplate($game_data, $session_data)
    {
        return [
            'game_data' => $game_data,
            'counts' => $this->getCounts($game_data),
            'hit_count' => $this->getHitCount($session_data),
            'last_hit_type' => $this->getLastHit($session_data),
            'bee_image' => $this->getBeeImageAssetData()
        ];
    }
}
