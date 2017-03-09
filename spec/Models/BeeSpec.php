<?php
    namespace Game\Models;
    use Game\Models\Bee;

    describe(Bee::class, function () {
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

        $this->bee_type = 'worker';
        $this->bee = new Bee($this->config, $this->bee_type);

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