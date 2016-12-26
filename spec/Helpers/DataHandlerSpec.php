<?php
    namespace Game\helpers;

    use Game\Helpers\DataHandler;

    describe(DataHandler::class, function () {
        $this->handler = new DataHandler();

        $this->handler->generateNewSessionid();
    });