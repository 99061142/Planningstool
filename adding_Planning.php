<?php
  include("db/connection.php");
  include("code/functions.php");
  include("code/get_checker.php");
  id_game_checker();

  $id = $_GET["id"];
  $one_game_Information = one_game_Information($id);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
        <title>Planner - inplannen</title>
        <?php include("include/styling_links.php"); ?>
  </head>
  <body>
		<nav class="navbar navbar-expand-md">
			  <h2 class="navbar-brand">Maak een afspraak voor de game <?= $one_game_Information["name"] ?></h2>
		    <?php include("include/navbar.php"); ?>
    </nav>
    <h2 class="text-center">U moet een datum toevoegen om de game te plannen.</h2>
    <p class="font-weight-light text-danger text-center">Als u geen tijd invult wordt de tijd automatch 00:00</p>
    <form method="post" action="planning_edit/planner_add.php?id=<?= $one_game_Information["id"] ?>">
      datum: <br><input class="mb-4 mt-2" type="date" name="question1"><br>
      tijd: <br><input class="mb-4 mt-2" type="time" name="question2"><br>
      host: <br><input class="mb-4 mt-2" type="varchar" name="question3"><br>
      players: <br><input class="mb-4 mt-2" type="varchar" name="question4"><br>
      <input type="submit">
    </form>
  </body>
</html>