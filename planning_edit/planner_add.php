<?php
    // All game connection
    include("../db/connection.php");
    include("../code/functions.php");
    $connection = game_db_conn();


    // Values
    $game_id = $_GET["id"];


    // Variables
    $inputLength = count($_POST);


    // Remove data that can break the system
    for($i = 1; $i <= $inputLength; $i++){
        $questionNumber = "question" . $i;
        $question = $_POST[$questionNumber];

        $question = trim($question);
        $question = stripslashes($question);
        $question = htmlspecialchars($question);            
        $_POST[$i] = $question;
    }

    
    try {
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Add a new game in the planning, with the information the user has given
        $stmt = $connection->prepare("INSERT INTO planning (game_id, game_date, game_time, host, players)
        VALUES (:game_id, :game_date, :game_time, :host, :players)");

        // Update the values that are send with it
        $stmt->bindParam(":game_id", $game_id);
        $stmt->bindParam(":game_date", $_POST[1]);
        $stmt->bindParam(":game_time", $_POST[2]);
        $stmt->bindParam(":host", $_POST[3]);
        $stmt->bindParam(":players", $_POST[4]);


        $stmt->execute();
        header("location: ../planning.php?info=added");
    }catch(PDOException $e){ 
        header("location: ../adding_Planning.php?id=$game_id&info=addedError");
    }
    $connection = null; 
?>