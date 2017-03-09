<?php
namespace Game\helpers;

use Game\Helpers\DataHandler;
use Game\Controllers\GameController;

describe(DataHandler::class, function () {
    $this->handler = new DataHandler();

    describe('->formatSessionData', function () {
        it('returns the game_data from data array when game data has been set', function () {
            $data = ['game_data' => ['some-data']];

            expect($this->handler->formatSessionData($data))->toBe(['some-data']);
        });

        it('returns empty array when game data is not set', function () {
            $data = null;

            expect($this->handler->formatSessionData($data))->toBe([]);
        });
    });

    describe('->getLastHit', function () {
        given('drone_count', function () {
            return 4;
        });

        given('queen_count', function () {
            return 1;
        });

        given('worker_count', function () {
            return 2;
        });

        given('config', function () {
            return [
                'drone' => [
                    'count' => $this->drone_count,
                    'damage_taken' => 4,
                    'total_hitpoints' => 4
                ],
                'queen' => [
                    'count' => $this->queen_count,
                    'damage_taken' => 2,
                    'total_hitpoints' => 20
                ],
                'worker' => [
                    'count' => $this->worker_count,
                    'damage_taken' => 1,
                    'total_hitpoints' => 10
                ]
            ];
        });

        it('returns an array of data for template', function () {
            $game_controller = new GameController($this->config);
            $game_data = $game_controller->buildBees();

            $expected_counts = [
                'drone' => $this->drone_count,
                'queen' => $this->queen_count,
                'worker' => $this->worker_count,
            ];

            $hit_count = 13;
            $last_hit_type = 'drone';

            $session_data = [
                'game_data' => $game_data,
                'hit_count' => $hit_count,
                'last_hit_type' => $last_hit_type
            ];

            $expeted_bee_image_data = [
                'drone' => 'drone.jpg',
                'queen' => 'queen.jpg',
                'worker' => 'worker.jpg'
            ];

            $game_data = $this->handler->formatSessionData($session_data);
            $template_data = $this->handler->getDataForTemplate($game_data, $session_data);

            expect($template_data['game_data'])->toBe($game_data);
            expect($template_data['counts'])->toBe($expected_counts);
            expect($template_data['hit_count'])->toBe($hit_count);
            expect($template_data['last_hit_type'])->toBe($last_hit_type);
            expect($template_data['bee_image'])->toBe($expeted_bee_image_data);
            expect($template_data)->toBeTruthy();
        });
    });
});
