<?php
    namespace Game;

    use Game\Models\Model;
    use Game\Views\View;
    use Game\Controllers\DisplayController;

    require "vendor/autoload.php";

    $model = new Model();
    $controller = new DisplayController($model);

    new View($controller, $model);
?>
