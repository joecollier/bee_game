<?php
    namespace Game\Controllers;
    use Game\Controllers\Bee;

    describe(Bee::class, function () {
        $this->bee = new Bee();

        describe('::create', function () {
            it('returns bee type', function () {
                expect($this->bee->getBeeType())->toBe('drone');
            });
        });
    });