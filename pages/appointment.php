<?php
  include("../code/id_checker.php");
  id_game_checker();

  $id = $_GET["id"];
  $one_game_Information = one_game_Information($id);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
        <title>Planner - inplannen</title>
        <?php include("../include/styling_links.php"); ?>
  </head>
  <body>
		<nav class="navbar navbar-expand-md">
			  <h2 class="navbar-brand">Maak een afspraak voor de game <?= $one_game_Information["name"] ?></h2>
		    <?php include("../include/navbar.php"); ?>
    </nav>
      <h2 class="text-center">Als je de tijden leeg laat vult hij automatisch de huidige tijd in.</h2>
      <form method="post" action="../code/planner/planner_add.php?id=<?= $one_game_Information["id"] ?>">
        datum: <input type="date" name="game_date"><br>
        tijd: <input type="time" name="game_time"><br>
        host: <input type="varchar" name="host"><br>
        players: <input type="varchar" name="players"><br>
        <input type="submit">
      </form>
  </body>
</html>