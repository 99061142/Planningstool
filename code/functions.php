<?php
    // Get the total amount of the games in games databse

    function game_Amount(){
        $db_connection = game_db_conn();
        
        $query = $db_connection->prepare("SELECT count(id) AS amount FROM games");
        $query->execute();
        $gameAmount = $query->fetch();
        return $gameAmount["amount"];
    }


    // Get the total amount of the games in planning databse

    function appointment_Amount(){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT count(id) AS amount FROM planning");
        $query->execute();
        $appointment_Amount = $query->fetch();
        return $appointment_Amount["amount"];
    }




    // Get the all the information of 1 game out of the games database

    function one_game_Information($id){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT * FROM games WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $one_game_Information = $query->fetch();
        return $one_game_Information;
    }


    // Get the all the information of 1 game out of the planning database

    function one_Planning_Information($id){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT * FROM planning WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $planning_editer = $query->fetch();
        return $planning_editer;
    }      




    // Get the name, and the id of all the games what gets ordered by the name of the game

    function all_games_Information(){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT id, name FROM games ORDER BY name");
        $query->execute();
        $all_games_Information = $query->fetchALL();
        return $all_games_Information;
    }


    // Get all the information of all the games that are planned, ordered by the date, and the time

    function appointment_Information(){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT * FROM planning ORDER BY game_date, game_time");
        $query->execute();
        $appointment_Information = $query->fetchAll();
        return $appointment_Information;
    }




    // Delete a game out of the planning database

    function delete_planner($id){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("DELETE FROM planning WHERE id= :id");
        $query->bindParam(":id", $id);
        $query->execute(); 
    }  
?>