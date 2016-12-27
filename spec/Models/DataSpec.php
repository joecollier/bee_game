<?php
    namespace Game\Models;

    use Game\Models\Data;

    xdescribe(Data::class, function () {
        $this->data = new Data();

        var_dump($this->data->getBeeArray(), 37373);

        // var_dump(212, $this->data);

        // describe('::deductHitPoints', function () {
        //     it('deducts hitpoints of a queen with 200 current hitpoints', function () {
        //         $this->bee = new Bee('queen');
        //         $this->bee_controller = new BeeController($this->bee);
        //         $this->bee_controller->hitBee();

        //         expect($this->bee->getBeeHitpoints())->toBe(192);
        //     });
        // });
    });