<?php
  include("db/connection.php");
  include("code/functions.php");
  include('code/get_checker.php');

  // Checks if the id and info is correct
  id_game_checker();

  // Values
  $id = $_GET["id"];
  $one_game_Information = one_game_Information($id);
?>




<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <title>Game - <?= $one_game_Information['name'] ?></title>
    <?php include('include/styling_links.php') ?>
  </head>
  <body>
	  <nav class='navbar navbar-expand-md'>
		  <h2 class='navbar-brand'><?= $one_game_Information['name'] ?></h2>
		  <?php include 'include/navbar.php' ?>
    </nav>
	  <div class='container'>
		  <div class='row'>
        <div style='width: 400px; height: 400px;' class='col-3 border border-secondary text-center'>
          <img class='w-100 h-100' src='afbeeldingen/<?= $one_game_Information['image'] ?>'>
        </div>
        <div class='col-9 border border-secondary text-center'>
          <h3>Omschrijving</h3>
          <p><?= $one_game_Information['description'] ?></p>
        </div>
        <div class='col-6 border border-secondary text-center'>
          <h3>Expansions</h3>
          <?php if($one_game_Information['expansions'] !== NULL){ ?>
	          <p><?= str_replace(';','<br>', $one_game_Information['expansions']) ?></p>
	        <?php }else{ ?>
	          <p>Er zijn geen expansions in deze game</p>
	        <?php } ?>
        </div>
        <div class='col-6 border border-secondary text-center'>
          <h3>Skills</h3>
				  <p><?= str_replace(';','<br>', $one_game_Information['skills']) ?></p>
        </div>
        <div style='height: 386px' class='col-6 border border-secondary p-0 text-center'>
          <h3>Website</h3>
          <a href='<?= $oneGameInformation['url'] ?>'>Website link</a>
          <?= $one_game_Information['youtube'] ?>
        </div>
        <div class='col-6 p-0'>
          <div class='border border-secondary text-center h-100'>
            <h3>Informatie</h3>
            <h4 class='my-2'>Spelers</h4>
					  <p>Minimaal <?= $one_game_Information['min_players'] ?> spelers</p>
					  <p>Maximaal <?= $one_game_Information['max_players'] ?> spelers</p>
					  <h4 class='my-2'>Tijd</h4>
					  <p>Speeltijd: <?= $one_game_Information['play_minutes'] ?> minuten</p>
					  <p>Tijd voor de uitleg: <?= $one_game_Information['explain_minutes'] ?> minuten</p>
            <h4 class='my-2'>Plan het spel in</h4>
            <button onclick="location.href='adding_Planning.php?id=<?= $one_game_Information['id'] ?>'">INPLANNEN</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>