<?php
    namespace Game\Controllers;

    use Game\Models\Bee;

    describe(BeeController::class, function () {
        describe('::deductHitPoints', function () {
            it('deducts hitpoints of a queen with 60 current hitpoints', function () {
                $this->bee = new Bee('queen');
                $this->bee_controller = new BeeController($this->bee);
                $this->bee_controller->hitBee();

                expect($this->bee->getBeeHitpoints())->toBe(192);
            });
        });
    });