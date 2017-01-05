<?php
    namespace Game\helpers;

    use Game\Helpers\DataHandler;
    use Game\Controllers\GameController;

    describe(DataHandler::class, function () {
        $this->handler = new DataHandler();

        $game_controller = new GameController();
        $this->data = ['game_data' => $game_controller->buildBees(), 'hit_count' => 0];

        describe('formatSessionData', function () {
            it('returns the game_data from data array', function () {
                $data = ['game_data' => ['some-data']];

                expect($this->handler->formatSessionData($data))->toBe(['some-data']);
            });
        });

        describe('getHitCount', function () {
            it('returns the correct hit count from data array', function () {
                $data = ['hit_count' => 10];

                expect($this->handler->getHitCount($data))->toBe(10);
            });
        });

        describe('getCounts', function () {
            it('returns count of each bee type', function () {
                $counts = $this->handler->getCounts($this->data['game_data']);

                expect($counts['drone'])->toBe(8);
                expect($counts['queen'])->toBe(1);
                expect($counts['worker'])->toBe(5);
            });
        });

        describe('formatSessionData', function () {
            it('returns game data when it exists', function () {
                $data = $this->handler->formatSessionData($this->data);
                expect($data)->toBe($this->data['game_data']);
            });

            it('returns null', function () {
                expect($this->handler->formatSessionData([]))->toBeNull();
            });
        });

        describe('getLastHit', function () {
            it('returns null', function () {
                expect($this->handler->getLastHit(['last_hit_type' => 'drone']))->toBe('drone');
            });

            it('returns null', function () {
                expect($this->handler->getLastHit([]))->toBeNull();
            });
        });
    });