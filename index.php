<?php
    include 'code/db_functions.php';
    $gameAmount = gameAmountFunction();
    $gamesNames = homepageFunction();
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>All Games</title>
        <?php include 'include/styling.php' ?>
    </head>
    <body class='bg-secondary'>
        <nav class='navbar navbar-expand-md'>
            <h2 class='homePage_Games_Amount'>U kunt uit <?php echo $gameAmount[0] ?> games kiezen</h2>
            <?php include 'include/navbar.php' ?>
        </nav>
        <div class="container">
            <?php foreach($gamesNames as $row){ ?>
                <div style='height: 40px;' class='row border border-dark bg-info'>
                    <div class="col-9 mt-2">
                        <p class='game_Name'><?php echo $row['name']; ?></p>
                    </div>
                    <div class="col-3 mt-2">
                        <a class='game_Detail_Link' href='organise.php?gameID=<?php echo $row['id']; ?>'>DETAILS VAN HET SPEL</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>