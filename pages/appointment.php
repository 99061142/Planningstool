<?php
  include('../code/id_checker.php');
?>




<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
        <title>Planner - inplannen</title>
        <?php include('../include/styling_links.php'); ?>
  </head>
  <body>
		<nav class='navbar navbar-expand-md'>
			  <h2 class='navbar-brand'>Maak een afspraak voor de game <?= $one_game_Information['name'] ?></h2>
		    <?php include('../include/navbar.php'); ?>
    </nav>
        <form method="post" action="../code/planner/planner_add.php?id=<?= $one_game_Information["id"] ?>">
          game_date: <input type="date" name="game_date"><br>
          game_time: <input type="time" name="game_time"><br>
          host: <input type="varchar" name="host"><br>
          players: <input type="varchar" name="players"><br>
          <input type="submit">
        </form>
  </body>
</html>