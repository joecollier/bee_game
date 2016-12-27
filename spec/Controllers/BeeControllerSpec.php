<?php
    namespace Game\Controllers;

    use Game\Models\Bee;

    xdescribe(BeeController::class, function () {
        describe('::deductHitPoints', function () {
            it('deducts hitpoints of a queen with 200 current hitpoints', function () {
                $this->bee = new Bee('queen');
                $this->bee_controller = new BeeController($this->bee);
                $this->bee_controller->hitBee();

                expect($this->bee->getBeeHitpoints())->toBe(192);
            });
        });
    });