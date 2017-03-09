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
$template_data = $data_handler->getDataForTemplate($game_data, $_SESSION);

echo $template->render($template_data);
