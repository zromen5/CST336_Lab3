<html>
    <head>
        
    </head>
    
    <body>
        <?php
            //echo "<img src =' ./img/cards/clubs/2.png' />";
            
            // initializa a list of players
            $player1 = array(
                'name' => 'Utsab',
                'imgURL' => './img/user_pics/blue_jay.jpg',
                'hand' => array(),
                'points' => 0
                );
            $player2 = array(
                'name' => 'Maggie',
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
                $player3,
                $player4
                );
            
            function printGameState($allPlayers) {
                foreach ($allPlayers as $player) {
                    echo "<img src ='" . $player['imgURL'] . "' />";
                    echo $player['name'] . "br/>";
                }
            }
            
            printGameState($allPlayers);
            
            getImgURLForCardIndex(0);
            
            //pseudocode
            // create and array of 52 cards
                // each card on associative array => suit, rank, imgURL, points
            // shuffle the array
            // pop off one card at a time to generate the hand

            function getImgURLForCardIndex($index) {
                //get a num from 0 to 51
                // return an img url
                
                $suitIndex = floor ($index / 13);
                
                echo "suitIndex: $suitIndex";
            }

            function generateDeck() {
                $suits = array ("clubs", "spades", "hearts", "diamonds");
                
                $deck = array();
                
                for ($i = 0; $i <= 3; $i++) {
                    for($j = 1; $j <= 13; $j++) {
                        
                        
                    }
                    
                }
                // for ($i = 0; $i < 51; $i++) {
                //     $card = array(
                //         'imgURL' => ""
                //         );
                // }
            }

        ?>
    </body>
</html>