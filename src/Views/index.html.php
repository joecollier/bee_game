<DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='assets/main.css' />
    </head>
    <body>
        <script type="text/javascript">
            // 'game_data' => $game_data,
            // 'counts' => $data_handler->getCounts($game_data),
            // 'hit_count' => $data_handler->getHitCount($_SESSION),
            // 'last_hit' => $data_handler->getLastHit($_SESSION),
            // 'bee_image' => [
            //     'drone' => 'drone.jpg',
            //     'queen' => 'queen.jpg',
            //     'worker' => 'worker.jpg'
            // ]

            var game_data = <?php echo json_encode($game_data); ?>;

            // game_data.forEach(function(current_bee) {
            //     console.log(current_bee);
            // });

            for (var i = 0; i < Object.keys(game_data).length; i++) {
                // var obj = game_data[i];

                console.log(game_data[i]);
            }

            // console.log(game_data);
        </script>
        <div id="game-container">
            <div id="game-board-container">1</div>
            <div id="game-stats-container">2</div>
        </div>
    </body>
</html>