<?php
    include 'code/db_functions.php';
    $oneGameID = $_GET['gameID'];
    $oneGameInformation = oneGameInformationFunction($oneGameID);
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Game - <?php echo $oneGameInformation[0]['name']; ?></title>
        <?php include 'include/styling.php' ?>
    </head>
    <body>
		<nav class='navbar navbar-expand-md'>
			<h2 class='gameName'><?php echo $oneGameInformation[0]['name'] ?></h2>
		  <?php include 'include/navbar.php' ?>
    </nav>
		<div class="container">
			<div class='row'>
        <div style='width: 400px; height: 400px;' class="col-3 border border-secondary text-center">
          <img class='w-100 h-100' src="afbeeldingen/<?php echo $oneGameInformation[0]['image'] ?>">
        </div>
        <div class="col-9 border border-secondary text-center">
          <h3>Omschrijving</h3>
            <p><?php echo $oneGameInformation[0]['description'] ?></p>
        </div>
        <div class="col-6 border border-secondary text-center">
          <h3>Expansions</h3>
          <?php if($oneGameInformation[0]['expansions'] !== NULL){ ?>
	             <p><?php echo str_replace(";","<br>", $oneGameInformation[0]['expansions']); ?></p>
	         <?php }else{ ?>
	           <p>Er zijn geen expansions in deze game</p>
	         <?php } ?>
        </div>
        <div class="col-6 border border-secondary text-center">
          <h3>Skills</h3>
				  <p><?php echo str_replace(";","<br>", $oneGameInformation[0]['skills']); ?></p>
        </div>
        <div style='height: 400px' class='col-6 border border-secondary p-0 text-center'>
          <h3>Website</h3>
          <a href="<?php echo $oneGameInformation[0]['url']; ?>">Website link</a>
          <?php echo $oneGameInformation[0]['youtube']; ?>
        </div>
        <div style='height: 400px' class='col-6 p-0'>
          <div class="border border-secondary text-center h-100">
            <h3>Informatie</h3>
            <h4 class='my-3'>Spelers</h4>
						<p>Minimaal <?php echo $oneGameInformation[0]['min_players'] ; ?> spelers</p>
						<p>Maximaal <?php echo $oneGameInformation[0]['max_players']; ?> spelers</p>
						<h4 class='my-3'>Tijd</h4>
						<p>Speeltijd: <?php echo $oneGameInformation[0]['play_minutes']; ?> minuten</p>
						<p>Tijd voor de uitleg: <?php echo $oneGameInformation[0]['explain_minutes']; ?> minuten</p>
            <h4 class='my-3'>Plan het spel in</h4>
            <button onclick="location.href='planner.php?gameID=<?php echo $oneGameID; ?>&schedule=true'">INPLANNEN</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>