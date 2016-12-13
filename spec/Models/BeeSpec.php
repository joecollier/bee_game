<?php
    namespace Game\Models;
    use Game\Models\Bee;

    describe(Bee::class, function () {
        $this->bee = new Bee();

        describe('::create', function () {
            it('creates bee object', function () {
                expect($this->bee->getBeeType())->toBe('drone');
                expect($this->bee->getBeeId())->toBe(0);
                expect($this->bee->getBeeHitpoints())->toBe(100);
            });
        });
    });