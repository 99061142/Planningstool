<?php
    // All game connection
    include("../functions.php");
    $connection = game_db_conn();





    // Values
    $planning_id = $_GET["id"];
    $game_id = $_GET["gameID"];
    $game_date = $_POST["game_date"];
    $game_time = $_POST["game_time"];
    $host = $_POST["host"];
    $players = $_POST["players"];


    $game_name = one_game_Information($game_id);
    $game_name = $game_name["name"];


    $planning_editer = planning_editer($planning_id);
    if($game_date == NULL){
        $game_date = $planning_editer["game_date"];
    }
    if($game_time == NULL){
        $game_time = $planning_editer["game_time"];
    }
    if($host == NULL){
        $host = $planning_editer["host"];
    }
    if($players == NULL){
        $players = $planning_editer["players"];
    }


    try {
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Update the planning item with the same id as given
        $stmt = $connection->prepare("UPDATE planning SET 
            game_name = :game_name, game_date = :game_date, game_time = :game_time, host = :host, players = :players 
            WHERE id = :planning_id");


        // Update the values that are send with it
        $stmt->bindParam(":planning_id", $planning_id);
        $stmt->bindParam(":game_name", $game_name);
        $stmt->bindParam(":game_date", $game_date);
        $stmt->bindParam(":game_time", $game_time);
        $stmt->bindParam(":host", $host);
        $stmt->bindParam(":players", $players);


        $stmt->execute(); 
        ?>
        <script>
            window.location.href = "../../pages/planning.php";
            alert('Het updaten van de planning is gelukt');            
        </script>
        <?php
    }catch(PDOException $e){ 
       ?>
       <script>
            window.location.href = "../../pages/editer.php?id=<?= $game_id ?>&info=update";
            alert('Het updaten van de planning is NIET gelukt'); 
        </script>
        <?php
    }
    $connection = null;
?>