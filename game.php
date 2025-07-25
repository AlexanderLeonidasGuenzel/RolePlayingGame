<!-- Game.php -->

<?php

include_once "Human.php";
include_once "Orc.php";
include_once "Data_Manager.php";
include_once "Ring.php";

$info = "";
$end = false;

if (isset($_POST['btn-submit'])){

  $cleanName = function(string $raw): string {
    if (!preg_match('/^[A-Za-z]{0,20}$/', $raw)) {
    die('Invalid player name - letters only (max.20).');
    }
    return $raw;          
};

  $_POST['p1_name'] = $cleanName($_POST['p1_name']);
  $_POST['p2_name'] = $cleanName($_POST['p2_name']);

  
  $p1_ring = new Ring($_POST['p1_ring']);
  $p2_ring = new Ring($_POST['p2_ring']);

  switch($_POST['p1_race']){
    case 'human': $p1 = new Human($_POST['p1_name'], $p1_ring); break;
    case 'orc': $p1 = new Orc($_POST['p1_name'], $p1_ring); break;
  }
  switch($_POST['p2_race']){
    case 'human': $p2 = new Human($_POST['p2_name'],$p2_ring); break;
    case 'orc': $p2 = new Orc($_POST['p2_name'], $p2_ring); break;
  }
  $round = rand(1,2);
}
else{
  $p1 = Data_Manager::loadPlayer(1);
  $p2 = Data_Manager::loadPlayer(2);

  if(isset($_POST['p1_attack'])){
    
    $info .= "$p1->name attacks $p2->name <br>";
    $attack_value = $p1->getAttackValue();
    $info .= $p2->attack($attack_value);
    $round = 2;
  }

  if(isset($_POST['p2_attack'])){
    $info .= "$p2->name attacks $p1->name <br>";
    $attack_value = $p2->getAttackValue();
    $info .= $p1->attack($attack_value);
    $round = 1;
  }

  if($p1->getHealth() <= 0){
    $info = "$p2->name wins";
    $end = true;
  }
  if($p2->getHealth() <= 0){
    $info = "$p1->name wins";
    $end = true;
  }
}
  Data_Manager::savePlayer(1, $p1);
  Data_Manager::savePlayer(2, $p2);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Role Playing Game</title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <main>
      <div class="box">
        <div class="card-container game">
          <div class="player-card">
            <div class="stats">
              <?php $p1Css = strtolower(get_class($p1)); ?>
              <h2 class="player-name <?php echo $p1Css; ?>"><?php echo $p1->name ?></h2>
              <p><span class="highlight">Race: </span><?php echo get_class($p1) ?></p>
              <p><span class="highlight">Health: </span><span><?php echo $p1->getHealth() ?></span></p>
              <p><span class="highlight">Strength: </span><span><?php echo $p1->getStrength() ?></span></p>
              <p><span class="highlight">Ring: </span><span><?php echo explode('(',$p1->ring->toString() )[0]   ?></span></p>
              <p><span><?php echo '(' . explode('(',$p1->ring->toString() )[1]   ?></span></p>
            </div>
            <div class="attack-btn">
              <form action="game.php" method="post">
                <input class="btn attack" type="submit" name="p1_attack" value="attack" <?php if($end || ($round == 2)) echo 'disabled'?>>
              </form>
            </div>
          </div>
          <div class="player-card">
            <div class="stats">
              <?php $p2Css = strtolower(get_class($p2)); ?>
              <h2 class="player-name <?php echo $p2Css; ?>"><?php echo $p2->name ?></h2>
              <p><span class="highlight">Race: </span><?php echo get_class($p2)?></p>
              <p><span class="highlight">Health: </span><span><?php echo $p2->getHealth() ?></span></p>
              <p><span class="highlight">Strength: </span><span><?php echo $p2->getStrength() ?></span></p>
              <p><span class="highlight">Ring: </span><span><?php echo explode('(',$p2->ring->toString() )[0]   ?></span></p>
              <p><span><?php echo '(' . explode('(',$p2->ring->toString() )[1]   ?></span></p>
            </div>
            <div class="attack-btn">
              <form action="game.php" method="post">
                <input class="btn attack" type="submit" name="p2_attack" value="attack" <?php if($end || ($round == 1)) echo 'disabled'?>>
              </form>
            </div>
          </div>
        </div>
      </div>
      <p>
        <?php 
          echo $info; 
            if($end){
            echo ' <form action="index.php" method="get">
            <input class="btn game" type="submit" value="New Game">
            </form>';
          }
        ?>
      </p>
    </main>
  </body>
</html>
