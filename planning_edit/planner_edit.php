<?php
    // Connections
    include("../db/connection.php");
    include("../code/functions.php");
    $connection = game_db_conn();


    // Values
    $planning_id = $_GET["id"];

    $one_Planning_Information = one_Planning_Information($planning_id);
    $game_ID = $one_Planning_Information["game_id"];


    // Variables
    $inputLength = count($_POST);


    // Remove data that can break the system
    for($i = 1; $i <= $inputLength; $i++){
        $questionNumber = "question" . $i;
        $question = $_POST[$questionNumber];


        if($question == ""){
           $question = $one_Planning_Information[$i + 1];
        }else{
            $question = trim($question);
            $question = stripslashes($question);
            $question = htmlspecialchars($question);            
        }
        $_POST[$i] = $question;
    }

    var_dump($_POST);


    try {
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Update the planning item with the same id as given
        $stmt = $connection->prepare("UPDATE planning SET 
            game_id = :game_id, game_date = :game_date, game_time = :game_time, host = :host, players = :players 
            WHERE id = :planning_id");


        // Update the values that are send with it
        $stmt->bindParam(":game_id", $game_ID);
        $stmt->bindParam(":game_date", $_POST[1]);
        $stmt->bindParam(":game_time", $_POST[2]);
        $stmt->bindParam(":host", $_POST[3]);
        $stmt->bindParam(":players", $_POST[4]);
        $stmt->bindParam(":planning_id", $planning_id);


        $stmt->execute(); 
        header("location: ../planning.php?info=updated");         
    }catch(PDOException $e){ 
        header("location: ../planning.php?info=updatedError"); 
    }
    $connection = null;   
?>