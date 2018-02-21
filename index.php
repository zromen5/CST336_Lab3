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
                'name' => 'Jeffrey',
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
                    for ($j = 0; $j < sizeof($player['hand']); $j++) {
                        displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
                    }
                    echo "<br/>";
                }
            }
            
            function generateDeck()
            {
                $cardArray = array();
                for($i=0; $i < 4; $i++){
                    array_push($cardArray, array());
                    for($j=0; $j< 13; $j++){
                        array_push($cardArray[$i], 1);
                    }
                }
                return $cardArray;
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
            
            function displayCard ($symbol, $value) {
                    switch ($symbol) {
                        case 0: echo "<img src='/Silverjack/cards/cards/clubs/$value.png' id = clubs".$value." alt='clubs".$value."' title= 'card' width = 85>";
                                break;
                        case 1: echo "<img src='/Silverjack/cards/cards/diamonds/$value.png' id = diamonds".$value ." alt='diamonds".$value."' title= 'card' width = 85>";
                                break;
                        case 2: echo "<img src='/Silverjack/cards/cards/hearts/$value.png' id = hearts".$value ." alt='hearts".$value."' title= 'card' width = 85>";
                                break;
                        case 3: echo "<img src='/Silverjack/cards/cards/spades/$value.png' id = spades".$value ." alt='spades".$value."' title= 'card' width = 85>";
                                break;
                    }
                }
                
            function pickCard (&$player, &$cardArray) {
                $symbol = rand (0,3);
                $index = array_rand ($cardArray[$symbol], 1);
                $value = $cardArray[$symbol][$index];
                while (!$cardArray[$symbol][$index]) {
                    $symbol = rand (0,3);
                    $index = array_rand ($cardArray[$symbol], 1);
                }
                $cardArray[$symbol][$index] = 0;
                array_push($player['hand'],array($symbol,$index+1));
            }
                
            function displayHand($players) {
                foreach ($players as $player) {
                    for ($j = 0; $j < sizeof($player['hand']); $j++) {
                        displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
                    }
                    echo "<br/>";
                }
            }
            
            function play($limit) {
                for($i = 1; $i < 5; $i++) {
                    $player = &${"player".$i};
                    
                    while($player['points'] < $limit) {
                        pickCard($player,$cardArray);
                    }
                }
                echo "<br/>";
                displayHand($players);
            }
            printGameState($allPlayers);

        ?>
    </body>
</html>