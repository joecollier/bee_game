<DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='assets/main.css' />
    </head>
    <body>
        <div id="container">
            <center>
                <div id="title">Welcome to the Bee Game!</div>
                <div id='bee-counts' style='height:220px;'>
                    <?php
                        if ($counts['queen'] > 0) {
                            echo "<div id='top-div'><div>";

                            $last_type = '';

                            foreach ($game_data as $bee) {
                                $div_clear = '';
                                $bold = '';

                                $type = $bee->type;

                                if ($type !== $last_type) {
                                    echo "<br>";
                                }

                                if ($last_hit == $type) {
                                    $bold = '-bold';
                                }

                                $count = $counts[$type];

                                if ($type !== $last_type) {
                                    echo "<div class='bee-status-type{$bold}'>Remaining {$type}s:</div>";
                                }
                                echo "<div class='bee-cell'>" . $bee->hitpoints . "</div>";

                                $last_type = $type;
                            }

                            echo "</div><div id='hit-button'><div>{$hit_count} hits</div>";
                        } else {
                            echo "<div id='hit-counter'>Game completed in {$hit_count} hits</div>";
                        }
                    ?>
                    <div>
                        <form method="post" action="index.php">
                            <input id="button" type="submit" value="hit" name="submit">
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </body>
</html>