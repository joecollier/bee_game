<?php
namespace Game;

use Game\Views\View;
use Game\Controllers\GameController;
use Game\Helpers\DataHandler;

require "vendor/autoload.php";

$config = file_get_contents('src/Config/config.json');
$config = json_decode($config, true);

$loader = new \Twig_Loader_Filesystem('src/Views/');
$twig = new \Twig_Environment($loader, []);

$game_controller = new GameController($config);
$game_controller->initializeGame();

$data_handler = new DataHandler();

if (isset($_SESSION)) {
    $game_data = $data_handler->formatSessionData($_SESSION);
}

$template = $twig->load('game.html');
$template_params = [
    'game_data' => $game_data,
    'counts' => $data_handler->getCounts($game_data),
    'hit_count' => $data_handler->getHitCount($_SESSION),
    'last_hit' => $data_handler->getLastHit($_SESSION),
    'bee_image' => [
        'drone' => 'drone.jpg',
        'queen' => 'queen.jpg',
        'worker' => 'worker.jpg'
    ]
];

echo $template->render($template_params);
