<?php
    include("db/connection.php");
    include("code/functions.php");
    $gameAmount = game_Amount();
    $all_games_Information = all_games_Information();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Homepage - <?= $gameAmount ?> games</title>
        <?php include("include/styling_links.php"); ?>
    </head>
    <body class="bg-secondary">
        <nav class="navbar navbar-expand-md">
            <h2 class="navbar-brand">U kunt uit <?= $gameAmount ?> games kiezen</h2>
            <?php include("include/navbar.php"); ?>
        </nav>
        <div class="container-fluid">
            <?php foreach($all_games_Information as $game_Information){ ?>
                <div style="height: 40px;" class="row border border-dark bg-info">
                    <div class="col-9 mt-2">
                        <p class="text-white"><?= $game_Information["name"] ?></p>
                    </div>
                    <div class="col-3 mt-2">
                        <a href="game_Information.php?id=<?= $game_Information["id"] ?>">Details van het spel</a>
                        <a class="ml-4" href="adding_Planning.php?id=<?= $game_Information["id"] ?>">Plan in</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>