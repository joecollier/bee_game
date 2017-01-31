<?php
    namespace Game;

    use Game\Views\View;
    use Game\Controllers\GameController;
    use Game\Helpers\DataHandler;

    require "vendor/autoload.php";

    $config = file_get_contents('src/Config/config.json');
    $config = json_decode($config, true);

    var_export($config);

    $game_controller = new GameController($config);
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
