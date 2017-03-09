                    <?php
                        if ($counts['queen'] > 0) {
                            echo "<div style='height:100%;'>Status<div>";

                            $last_type = '';

                            foreach ($game_data as $bee) {
                                // $div_clear = '';

                                if ($bee->type !== $last_type) {
                                    // $div_clear = 'clear:both';
                                    echo "<br>";
                                }

                                // if ($bee->type == 'queen') {
                                //     die();
                                // }

                                ?>
                                <div style='float:left; height:40px; width:40px; position:relative;'>
                                    <div style='height:100%; width:100%; float:left; position:absolute;'>1</div>
                                    <div style='
                                        height:100%;
                                        width:100%;
                                        float:left;
                                        position:absolute;
                                        background-color:rgba(0,172,0, 0.6);'>2</div>
                                </div>
                                <?php

                                // echo "<div style='float:left;'> | " . $bee->hitpoints . " | </div>";

                                $last_type = $bee->type;

                                // var_dump($bee->type, $bee->id, $bee->hitpoints);
                                // echo "<br>";
                            }

                            // foreach ($counts as $type => $count) {
                            //     $bold = '';
                            //     if ($last_hit == $type) {
                            //         $bold = '-bold';
                            //     }

                            //     echo "<div class='bee-status-type{$bold}'>Remaining {$type}s:</div>";

                            //     echo "<div class='bee-status-count'>";
                            //         echo "<div style='width:100px; background-color:green; display:table; width:200px'>";
                            //         echo "<center>";
                            //         for ($i=0; $i < $count; $i++) {
                            //             echo "<div style='float:left;'><img src='{$bee_image[$type]}'>.</div>";
                            //         }
                            //         echo "</center>";
                            //         echo "</div>";
                            //     echo "</div>";
                            // }
                            echo "<div>{$hit_count} hits</div>";
                        } else {
                            echo "<div style='height:100%;'>Game completed in {$hit_count} hits</div>";
                        }
                    ?>