<?php
namespace Game\Controllers;

use Game\Models\Bee;
use kahlan\plugin\Stub;

describe(GameController::class, function () {
    describe('damageBee', function () {
        $this->config = [
            'drone' => [
                'count' => 8,
                'damage_taken' => 12,
                'total_hitpoints' => 50
            ],
            'queen' => [
                'count' => 1,
                'damage_taken' => 8,
                'total_hitpoints' => 100
            ],
            'worker' => [
                'count' => 5,
                'damage_taken' => 10,
                'total_hitpoints' => 75
            ]
        ];

        it('expects a new bees hitpoints to decrease from 100 to 92 when hit', function () {
            $type = 'queen';
            $total_hitpoints = $this->config[$type]['total_hitpoints'];
            $damage_taken = $this->config[$type]['damage_taken'];
            $expected_health_after_damage_taken = $total_hitpoints - $damage_taken;

            $this->bee = new Bee($this->config, $type);
            expect($this->bee->hitpoints)->toBe($total_hitpoints);

            $this->game_controller = new GameController($this->config, $this->bee);
            $this->game_controller->damageBee($this->bee);
            expect($this->bee->hitpoints)->toBe($expected_health_after_damage_taken);
        });

        it('Calls method on bee object to determine the bee\'s hitpoints', function () {
            $type = 'queen';

            $this->bee = new Bee($this->config, $type);

            Stub::on($this->bee)
                ->method('getBeeHitpoints')
                ->andReturn(0);

            $this->game_controller = new GameController($this->config, $this->bee);
            $this->game_controller->damageBee($this->bee);

            expect($this->bee)->toReceive('getBeeHitpoints');
        });
    });
});
