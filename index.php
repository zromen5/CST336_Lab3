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

        <audio autoplay>
                <source src=sound/happyKids.mp3 type=audio/mpeg>
                Your browser does not support the audio element.
        </audio>
        
        <?php
        
            // initializing a list of players
            $player1 = array(
                'name' => 'Irais',
                'imgURL' => './img/user_pics/me.png',
                'hand' => array(),
                'points' => 0
                );
            $player2 = array(
                'name' => 'Raquel',
                'imgURL' => './img/user_pics/Raquel.jpg',
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
            
            // displays the names, pictures, cards/suits in deck of the players
            function printGameState($allPlayers) {
                foreach ($allPlayers as $player) {
                    echo "<img src ='" . $player['imgURL'] . "' width = 150px />";
                    echo "<h2>",$player['name'] . "</h2>";
                    for ($j = 0; $j < sizeof($player['hand']); $j++) {
                        displayCard($player['hand'][$j][0], $player['hand'][$j][1]);
                    }
                }
            }
            
            // creates the deck of cards
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
            
            // suits of the deck
            function displayCard ($symbol, $value) {
                    switch ($symbol) {
                        case 0: echo "<img class = 'card' src='img/cards/clubs/$value.png' id = clubs".$value." alt='clubs".$value."' title= 'card' width = 100>";
                                break;
                        case 1: echo "<img class = 'card' src='img/cards/diamonds/$value.png' id = diamonds".$value ." alt='diamonds".$value."' title= 'card' width = 100>";
                                break;
                        case 2: echo "<img class = 'card' src='img/cards/hearts/$value.png' id = hearts".$value ." alt='hearts".$value."' title= 'card' width = 100> ";
                                break;
                        case 3: echo "<img class = 'card' src='img/cards/spades/$value.png' id = spades".$value ." alt='spades".$value."' title= 'card' width = 100>";
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
            }
            
            // picks a player depending on the points and array size
            // then displays the winner(s) along with the points they earned
            function displayWinner($allPlayers){
                echo "<h3>";
                $winner = array('points' => 0);
                $totalPoints = 0;
                $tmp = array();
                $tie = false;
                foreach($allPlayers as $player) {
                    if($player['points'] > $winner['points'] && $player['points'] < 43){
                        $winner = $player;
                    }
                    $totalPoints += $player['points'];
                }
                foreach($allPlayers as $player){
                    if($player['points'] == $winner['points'])
                        array_push($tmp,$player);
                }
                $totalPoints -= $winner['points'];
                echo "<h3 id='result'><i>";
                if (sizeof($tmp) == 1)
                    echo $winner['name']." wins ".$totalPoints;
            
                else {
                    echo "<br/> Draw between: ";
                    for($i = 0; $i < sizeof($tmp) - 1; $i++)
                        echo $tmp[$i]['name']." ";
                    echo "and ".$tmp[sizeof($tmp) - 1]['name']." ".$totalPoints;
                }
                    echo "!!</i></h3>";
            }

            function displayPoints(&$allPlayers){
                foreach($allPlayers as $player) {
                    echo "<div class='point'>".$player['points']."</div>";
                }
            }
    
            function play($limit, &$allPlayers) {
                $cardArray = generateDeck();
                foreach($allPlayers as &$player) {
                    while($player['points'] < $limit) {
                        pickCard($player,$cardArray);
                    }
                    echo "<br/>";
                    displayHand($player);
                }              
            }

            // making the pictures and names of players display randomly
            shuffle ($allPlayers);      
              
            echo "<div class='players'>";
            printGameState($allPlayers);
            echo"</div>";
            
            echo "<div class='cards'>";
            play(35, $allPlayers);
            echo "</div>";
            
            echo "<div class='points'>";
            displayPoints($allPlayers);
            echo "</div>";
            
            displayWinner($allPlayers);
        ?>
        
        <div id = "main" style = "text-align:center">
            <form>
                <input type = "submit" value = "Play again!" style = "font-size: 35px"/>
            </form>
        </div>
        
    </body>
</html>