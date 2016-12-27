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
                            echo "<div style='height:100%;'>Status<div>";
                            foreach ($counts as $type => $count) {
                                $bold = '';
                                if ($last_hit == $type) {
                                    $bold = '-bold';
                                }

                                echo "<div class='bee-status-type{$bold}'>Remaining {$type}s:</div>";
                                echo "<div class='bee-status-count'>{$count}</div>";
                            }
                            echo "<div>{$hit_count} hits</div>";
                        } else {
                            echo "<div style='height:100%;'>Game completed in {$hit_count} hits</div>";
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