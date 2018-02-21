<html>
    <head>
        
    </head>
    
    <body>
        <?php
            //echo "<img src =' ./img/cards/clubs/2.png' />";
            
            // initializa a list of players
            $player1 = array(
                'name' => 'Irais',
                'imgURL' => './img/user_pics/me.png',
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
            $player4 = array(
                'name' => 'Martin',
                'imgURL' => './img/user_pics/Martin.jpg',
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
                    echo $player['name'] . "<br/>";
                }
            }
            function generateDeck()
            {
                for ($i = 0; $i < 51; $i++) {
                     $card= array('imgURL' => "");
                }
            }
            function getHand()
            {
                for($i = 0; $i < 5; $i++)
                {
                    
                }
            }
            function getImgURLForCardIndex($index)
            {
                $suitIndex= floor($index/13);
                switch ($suitIndex) {
                    case 0:
                        // code...
                        break;
                    
                    default:
                        // code...
                        break;
                }
            }
            
            printGameState($allPlayers);

        ?>
    </body>
</html>