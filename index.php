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
            //echo "<img src =' ./img/cards/clubs/2.png' />";
            
            // initializa a list of players
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
                'name' => 'Jeffrey',
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
                        displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
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
                        case 0: echo "<img class = 'img1' src='img/cards/clubs/$value.png' id = clubs".$value." alt='clubs".$value."' title= 'card' width = 85>";
                                break;
                        case 1: echo "<img class = 'img1' src='img/cards/diamonds/$value.png' id = diamonds".$value ." alt='diamonds".$value."' title= 'card' width = 85>";
                                break;
                        case 2: echo "<img class = 'img1' src='img/cards/hearts/$value.png' id = hearts".$value ." alt='hearts".$value."' title= 'card' width = 85> ";
                                break;
                        case 3: echo "<img class = 'img1' src='img/cards/spades/$value.png' id = spades".$value ." alt='spades".$value."' title= 'card' width = 85>";
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
                    displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
                }
            echo "<br/>";
            }
            
            function displayWinner($allPlayers){
                //echo "<h3>";
                echo "<audio autoplay>
                    <source src=sound/Win.mp3 type=audio/mpeg>
                    Your browser does not support the audio element.
                    </audio>";
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
                    echo "<h3><i>",$winner['name']." wins ".$totalPoints."!!</i></h3>";
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
            printGameState($allPlayers);
            
            play(35, $allPlayers);
        ?>
    </body>
</html>