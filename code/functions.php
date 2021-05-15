<?php
    include("db/connection.php");




    // Get the total amount of all the games where the user can choose from
    function game_Amount(){
        $db_connection = game_db_conn();
        $query = $db_connection->prepare("SELECT count(id) AS amount FROM games");
        $query->execute();
        $gameAmount = $query->fetch();
        return $gameAmount['amount'];
    }


    // Amount of the games that are planned
    function appointment_Amount(){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT count(id) AS amount FROM planning");
        $query->execute();
        $appointment_Amount = $query->fetch();
        return $appointment_Amount['amount'];
    }  




    // Get the id and the name off all the games, for the homepage
    function all_games_Information(){
        $db_connection = game_db_conn();
        $query = $db_connection->prepare("SELECT id, name FROM games ORDER BY name");
        $query->execute();
        $all_games_Information = $query->fetchALL();
        return $all_games_Information;
    }


    // Get information of all the games that are planned, in order by date
    function appointment_Information(){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT * FROM planning ORDER BY game_date, game_time");
        $query->execute();
        $appointment_Information = $query->fetchAll();
        return $appointment_Information;
    }


    function planning_editer($id){
        $db_connection = game_db_conn();

        $query = $db_connection->prepare("SELECT * FROM planning WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $planning_editer = $query->fetch();
        return $planning_editer;
    }      




    // Get all the information off 1 game, with the id that gets send with it
    function one_game_Information($id){
        $db_connection = game_db_conn();
        $query = $db_connection->prepare("SELECT * FROM games WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $one_game_Information = $query->fetch();
        return $one_game_Information;
    }


    // Delete 1 game out of the planner database

    function delete_planner($id){
        $db_connection = game_db_conn();
        $query = $db_connection->prepare("DELETE FROM planning WHERE id= :id");
        $query->bindParam(':id', $id);
        $query->execute(); 
    }  
?>