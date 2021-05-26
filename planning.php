<?php
    include("db/connection.php");
	include("code/functions.php");
	$appointment_Amount = appointment_Amount();
	$appointment_information = appointment_Information();


    // Variables
    $planning_count = 0;


    // Values
    $info = $_GET["info"];


    // Give feedback what the user did with the planning
    if($info == "deleted"){
        echo "U heeft de game verwijderd";
    }
    else if($info == "deletedError"){
        echo "U heeft de game niet verwijderd";
    }
    else if($info == "added"){
        echo "U heeft de game toegevoegd";
    }
    else if($info == "addedError"){
        echo "U heeft de game niet toegevoegd";
    }
    else if($info == "updated"){
        echo "U heeft de game geupdate";
    }
    else if($info == "updatedError"){
        echo "U heeft de game niet geupdate";
    }


    // Add all the gaming names to the array, then add them in the planning shower
    foreach($appointment_information as $game_information){
        // Values
        $id = $game_information["game_id"];
        $one_game_Information = one_game_Information($id);

        // All the names of the games
        $oneGameName = $one_game_Information["name"];
        $game_Name_Array[] = $oneGameName;


        // Total play time of the games
        $playTime = $one_game_Information["play_minutes"] + $one_game_Information["explain_minutes"];

        $startTime = substr($game_information["game_time"], 0, -3);
        $endTime = date("H:i", strtotime("$startTime + $playTime minute"));    
        $totalTime = "$startTime-$endTime";
        $game_Playtime_Array[] = $totalTime;
    }
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Planning</title>
		<?php include("include/styling_links.php"); ?>
	</head>
	<body class="bg-secondary">
	    <nav class="navbar navbar-expand-md">
	        <h2 class="navbar-brand">Er is/zijn <?= $appointment_Amount ?> game(s) ingepland</h2>
	        <?php include("include/navbar.php"); ?>
	    </nav>
	    <div class="container-fluid">
            <div class="row border border-dark bg-primary">
                <div class="col">
                    <h2>Game</h2>
                </div>
                <div class="col">
                    <h2>Datum</h2>
                </div>
                <div class="col">
                    <h2>Tijd</h2>
                </div>
                <div class="col">
                    <h2>Host</h2>
                </div>
                <div class="col">
                    <h2>Bewerken</h2>
                </div>
            </div>
            <?php foreach($appointment_information as $game_information){ ?>
                <div class="row border border-dark bg-info planning_Game_Information">
                    <div class="col">
       					<p><?= $game_Name_Array[$planning_count] ?></p>
                    </div>      
                    <div class="col">
                        <p><?= $game_information["game_date"] ?></p>
                    </div> 
                    <div class="col">
                        <p><?= $game_Playtime_Array[$planning_count] ?></p>
                    </div> 
                    <div class="col">
                        <p><?= $game_information["host"] ?></p>
                    </div>    
                    <div class="col planning_Game_Edit_Links">
                        <a class="text-decoration-none mr-4" href="edit_Planning.php?id=<?= $game_information["id"] ?>&info=update">Bewerk</a>
                        <a class="text-decoration-none" href="edit_Planning.php?id=<?= $game_information["id"] ?>&info=delete">Verwijder</a>
                    </div>                                                 
                </div>
                <?php 
                $planning_count++;
            } 
            ?>
        </div>
	</body>
</html>