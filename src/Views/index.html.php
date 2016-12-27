<?php
    echo '93rij3=jkjkd';
?>

<DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='assets/main.css' />
    </head>

    <body>
        <div id="container">
            <center>
                <div id="title">Welcome to the Bee Game!</div>

                <div id="bee-counts">
                    Bee Count<br>
                    Queens: 1 <?php (echo 100); ?><br>
<!--                     Workers: <?php echo($_SESSION['game_data']['worker']);?><br>
                    Drones: <?php echo($_SESSION['game_data']['drone']);?><br> -->
                </div>
                <form method="post" action="index.php">
                    <input id="button" type="submit" value="hit" name="submit">
                </form>
            </center>
        </div>

        <div style="display:none;"><?php var_dump($_SESSION['colony']); ?></div>
    </body>
</html>