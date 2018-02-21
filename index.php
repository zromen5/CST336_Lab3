<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Team Batman: Silver Jack</title>
        
        <link href ="css/styles.css" rel =" stylesheet" type = "text/css"/>
    </head>
    
    <body>
        <header>
            <h1 style="font-size:60px;">Silver Jack</h1>
        </header>
        <?php

            $player1 = array(
                'name' => 'Irais',
                'imgURL' => './img/user_pics/me.png',
                'hand' => array(),
                'points' => 0
                );
            $player2 = array(
                'name' => 'Raquel',
                'imgURL' => './img/user_pics/Raquels_pic.jpg',
                'hand' => array(),
                'points' => 0
                );
            $player3 = array(
                'name' => 'Joffrey',
                'imgURL' => './img/user_pics/joffrey.jpg',
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
                    echo "<img src ='" . $player['imgURL'] . "' width = 150px />";
                    echo "<h2>",$player['name'] . "</h2>";
                    
                    for ($j = 0; $j < sizeof($player['hand']); $j++) {
                        echo "<div class = 'output'>";
                        displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
                        echo "</div";
                    }
                    //echo "<br/>";
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
            
            // function getHand()
            // {
            //     for($i = 0; $i < 5; $i++)
            //     {
                    
            //     }
            // }
            // function getImgURLForCardIndex($index)
            // {
            //     $suitIndex= floor($index/13);
            //     switch ($suitIndex) {
            //         case 0:
            //             // code...
            //             break;
                    
            //         default:
            //             // code...
            //             break;
            //     }
            // }
            
            function displayCard ($symbol, $value) {
                    switch ($symbol) {
                        case 0: echo "<img class = 'clubs' src='img/cards/clubs/$value.png' ".$value." alt='clubs".$value."' title= 'card' width = 85>";
                                break;
                        case 1: echo "<img class = 'diamonds' src='img/cards/diamonds/$value.png' ".$value ." alt='diamonds".$value."' title= 'card' width = 85>";
                                break;
                        case 2: echo "<img class = 'hearts' src='img/cards/hearts/$value.png' ".$value ." alt='hearts".$value."' title= 'card' width = 85> ";
                                break;
                        case 3: echo "<img class = 'spades' src='img/cards/spades/$value.png' ".$value ." alt='spades".$value."' title= 'card' width = 85>";
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
                $player['points'] += $index+1;
            }
            
            function displayHand($player) {
                for ($j = 0; $j < sizeof($player['hand']); $j++) {
                    echo "<div class = 'output'>";
                    displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
                    echo "</div";
                }
            echo "<br/>";
            }
            
            function displayWinner($allPlayers){
                $winner = array('points' => 0);
                $totalPoints = 0;
                /*$tie = arra;
                */foreach($allPlayers as $player) {
                    $tie = $player['points'] == $winner['points'];
                    if($player['points'] > $winner['points'] && $player['points'] < 43){
                        $winner = $player;
                    }
                    $totalPoints += $player['points'];
                }
                $totalPoints -= $winner['points'];
                echo "<div class = 'text'>";
                    echo "<h3><i>",$winner['name']." wins ".$totalPoints."!!</i></h3>";
                echo "</div";
                //else
            }
            
            function play($limit, $allPlayers) {
                $cardArray = generateDeck();
                foreach($allPlayers as &$player) {
                    while($player['points'] < $limit) {
                        pickCard($player,$cardArray);
                    }
                    echo "<br/>";
                    displayHand($player);
                }
                displayWinner($allPlayers);
                
            }
            
            echo "<audio autoplay>
                    <source src=sound/Yay.mp3 type=audio/mpeg>
                    // Your browser does not support the audio element.
                    </audio>";
                    
            printGameState($allPlayers);
            
            play(35, $allPlayers);
        ?>
    </body>
</html>