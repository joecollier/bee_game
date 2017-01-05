<?php
    namespace Game;

    use Game\Views\View;
    use Game\Controllers\GameController;
    use Game\Helpers\DataHandler;

    require "vendor/autoload.php";

    $game_controller = new GameController();
    $game_controller->initializeGame();

    $data_handler = new DataHandler();

    if (isset($_SESSION)) {
        $game_data = $data_handler->formatSessionData($_SESSION);
    }

    $view = new View();
    $view->render(
        'index.html.php',
        [
            'game_data' => $game_data,
            'counts' => $data_handler->getCounts($game_data),
            'hit_count' => $data_handler->getHitCount($_SESSION),
            'last_hit' => $data_handler->getLastHit($_SESSION)
        ]
    );
?>
