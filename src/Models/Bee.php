<?php
namespace Game\Models;

/**
* Model to represent the Bee object
*/
class Bee
{
    /**
     * Type of bee
     * @var string $type
     */
    public $type;

    /**
     * Id of current bee
     * @var int $id
     */
    public $id;

    /**
     * Hitpoints of current bee
     * @var int $hitpoints
     */
    public $hitpoints;

    /**
     * Config of values for damage taken by bee type
     * @var array $damage_taken_by_type
     */
    protected $damage_taken_by_type = [
        'queen' => 8,
        'drone' => 12,
        'worker' => 10
    ];

    /**
     * Config of values default HP by bee type
     * @var array $hitpoints_by_type
     */
    protected $hitpoints_by_type = [
        'drone' => 50,
        'queen' => 100,
        'worker' => 75
    ];

    /**
     * @param string  $type      i.e. drone, worker, queen
     * @param integer $id
     * @param integer $hitpoints
     */
    public function __construct($type = 'drone', $id = 0, $hitpoints = -1)
    {
        $this->setBeeType($type);
        $this->setBeeId($id);
        $this->setBeeHitpoints($hitpoints, $type);
    }

    /**
     * Sets the type of bee
     *
     * @param string $type i.e. worker, drone, queen
     */
    protected function setBeeType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the type of bee
     *
     * @return string i.e. worker, drone, queen
     */
    public function getBeeType()
    {
        return $this->type;
    }

    /**
     * Sets integer id of the bee
     *
     * @param int
     */
    protected function setBeeId($id)
    {
        $this->id = $id;
    }

    /**
     *  Returns unique integer id of the bee
     *
     * @return int
     */
    public function getBeeId()
    {
        return $this->id;
    }

    /**
     * Gets the default hitpoints for each bee type in accordance
     * with the game rules
     *
     * @param  string $type i.e. worker, drone, queen
     * @return int
     */
    public function getDefaultHitpointsByType($type)
    {
        return $this->hitpoints_by_type[$type];
    }

    /**
     * Updated the current hitpoints of the bee
     *
     * @param int $hitpoints
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
     * Returns the current hitpoints for the bee
     *
     * @return int
     */
    public function getBeeHitpoints()
    {
        return $this->hitpoints;
    }

    /**
     * Sets the bees hitpoints to be the current value minus the
     * damage taken after a hit is recorded
     */
    public function deductHP()
    {
        $new_hp = $this->getBeeHitpoints() - $this->damage_taken_by_type[$this->getBeeType()];
        $new_hp = ($new_hp > 0)
            ? $new_hp
            : 0;

        $this->setBeeHitpoints($new_hp);
    }
}
