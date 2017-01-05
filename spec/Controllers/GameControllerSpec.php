<?php
    namespace Game\Controllers;

    use Game\Models\Bee;

    describe(GameController::class, function () {
        describe('damageBee', function () {
            it('expects a new bees hitpoints to decrease from 100 to 92 when hit', function () {
                $this->bee = new Bee('queen');
                expect($this->bee->hitpoints)->toBe(100);

                $this->game_controller = new GameController($this->bee);
                $this->game_controller->damageBee($this->bee);
                expect($this->bee->hitpoints)->toBe(92);
            });
        });
    });