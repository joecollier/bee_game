<?php
    namespace Game;

    use Game\Models\Model;
    use Game\Views\View;
    use Game\Controllers\DisplayController;
    use Game\Controllers\BeeController;
    use Game\Controllers\GameController;

    require "vendor/autoload.php";

    $model = new Model();
    $display_controller = new DisplayController($model);

    $game_controller = new GameController();
    $game_controller->initializeGame();

    new View($display_controller, $model);
?>
