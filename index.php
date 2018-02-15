<html>
    <head>
        
    </head>
    
    <body>
        <?php
            //echo "<img src =' ./img/cards/clubs/2.png' />" ;
            
            // initializa a list of players
            $player1 = array(
                'name' => 'Utsab',
                'imgURL' => './img/user_pics/blue_jay.jpg',
                'hand' => array(),
                'points' => 0
                );
            $player2 = array(
                'name' => 'Raquel',
                'imgURL' => './img/user_pics/scotty_pic.jpg',
                'hand' => array(),
                'points' => 0
                );
            $player3 = array(
                'name' => 'Joe',
                'imgURL' => './img/user_pics/cockatiel_pic.jpg',
                'hand' => array(),
                'points' => 0
                );
            
            $allPlayers = array (
                $player1,
                $player2,
                $player3
                );
            
            function printGameState($allPlayers) {
                foreach ($allPlayers as $player) {
                    echo "<img src ='" . $player['imgURL'] . "' />";
                    echo $player['name'] . "'/>";
                }
            }
            
            printGameState($allPlayers);

        ?>
    </body>
</html>
