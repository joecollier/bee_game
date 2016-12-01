<?php
    namespace Game;

    use Game\Models\Model;
    use Game\Views\View;
    use Game\Controllers\Controller;

    require "vendor/autoload.php";

    $model = new Model();
    $controller = new Controller($model);

    new View($controller, $model);
?>
