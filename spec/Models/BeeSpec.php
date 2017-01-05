<?php
    namespace Game\Models;
    use Game\Models\Bee;

    describe(Bee::class, function () {
        $this->bee_type = 'worker';
        $this->bee = new Bee($this->bee_type);

        it('creates bee object of the worker type', function () {
            expect($this->bee->getBeeType())->toBe($this->bee_type);
        });

        it('expects first bee\'s id to be 0', function () {
            expect($this->bee->getBeeId())->toBe(0);
        });

        it('expects first bees id to be 0', function () {
            $hitpoints = $this->bee->getDefaultHitpointsByType($this->bee_type);

            expect($this->bee->getBeeHitpoints())->toBe($hitpoints);
        });
    });