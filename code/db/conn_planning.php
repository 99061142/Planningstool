<?php
    // All game connection
    include("../functions.php");
    $connection = game_db_conn();




    try {
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $connection->prepare("INSERT INTO planning (game_name, game_date, game_time, host, players)
        VALUES (:game_name, :game_date, :game_time, :host, :players)");
        $stmt->bindParam(":game_name", $game_name);
        $stmt->bindParam(":game_date", $game_date);
        $stmt->bindParam(":game_time", $game_time);
        $stmt->bindParam(":host", $host);
        $stmt->bindParam(":players", $players);


        // Values
        $game_id = $_GET["id"];
        $game_date = $_POST["game_date"];
        $game_time = $_POST["game_time"];
        $host = $_POST["host"];
        $players = $_POST["players"];

        // Update the values
        $game_time = date("H:i");

        $one_game_Information = one_game_Information($game_id);
        $game_name = $one_game_Information["name"];

        $stmt->execute(); ?>

        <script>
            window.location.href = "../../pages/planning.php";
            alert('Het toevoegen van de game "<?= $game_name ?>" is gelukt');            
        </script>
    <?php }catch(PDOException $e){ ?>
        <script>
            window.location.href = "../../pages/appointment.php?id=<?= $game_id ?>";
            alert('Het toevoegen van de game "<?= $game_name ?>" is NIET gelukt');
        </script>
    <?php }
    $connection = null; 
?>