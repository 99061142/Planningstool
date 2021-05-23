<?php
	include("db/connection.php");
	include("code/functions.php");
    include("code/get_checker.php");
    
    // Checks if the id and info is correct
    id_planning_checker();
    info_checker();


    // Get all the information of the planning the user wants to chance
	$id = $_GET["id"];
	$info = $_GET["info"];
	$one_Planning_Information = one_Planning_Information($id);

	// Get the name with the game id in the database
	$game_id = $one_Planning_Information["game_id"];
	$one_game_Information = one_game_Information($game_id);
	$game_name = $one_game_Information["name"];


	// Calculate The start, and end time of the game
    $playTime = $one_game_Information['play_minutes'] + $one_game_Information['explain_minutes'];


    $startTime = substr($one_Planning_Information["game_time"], 0, -3);
    $endTime = date("H:i", strtotime("$startTime + $playTime minute"));    
    $totalTime = $startTime . "-" . $endTime;




	// If the user said they want to delete the planning
	if(isset($_POST["delete"])){ 
		delete_planner($id); ?>
		<script>
	        window.location.href = "planning.php";
	        alert("Het verwijderen is gelukt");
	    </script>
	    <?php
	}

	// If the user said they don't want to delete the planning
	else if(isset($_POST["back"])) { ?>
		<script>
	        window.location.href = "planning.php";
	        alert("Je hebt de planning niet verwijderd");
	    </script>
	    <?php
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<?php include("include/styling_links.php"); ?>
</head>
	<body>
        <nav class="navbar navbar-expand-md">
            <h2 class="navbar-brand">Edit</h2>
            <?php include("include/navbar.php"); ?>
        </nav>
        <div class="container-fluid">
	        <div class="row border border-dark bg-info all_planner_information">
	            <div class="col-3">
	       			<p><?= $game_name ?></p>
	            </div>      
	            <div class="col-2">
	                <p><?= ($one_Planning_Information["game_date"]) ?></p>
	            </div> 
	            <div class="col-2">
	               	<p><?= $totalTime ?></p>
	            </div> 
	            <div class="col-2">
	               	<p><?= $one_Planning_Information["host"] ?></p>
	            </div>    
	            <div class="col-3">
	                <p><?= $one_Planning_Information["players"] ?></p>
	            </div>                                                
	        </div>
	    </div>


        <?php if($info == "update"){ ?>
			<h2 class="text-center">Vul een vak in die u wilt veranderen</h2>
        	<form class="container-fluid mt-3" method="post" action="planning_edit/planner_edit.php?id=<?=$id ?>">
	          	Datum: <br><input class="mb-4 mt-2" type="date" name="question1"><br>
	          	Tijd: <br><input class="mb-4 mt-2" type="time" name="question2"><br>
	          	Host: <br><input class="mb-4 mt-2" type="varchar" name="question3"><br>
	          	Spelers: <br><input class="mb-4 mt-2" type="varchar" name="question4"><br>
	        	<input type="submit">
        	</form>
		<?php }else{ ?>
			<h2 class="text-center">Weet u zeker dat u deze planning wilt verwijderen?</h2>
			<form method="post" class="text-center mt-5">
				<input class="px-5 py-2 mr-3" type="submit" name="delete" value="Ja"/>
				<input class="px-5 py-2" type="submit" name="back" value="Nee"/>
			</form>
		<?php } ?>
	</body>
</html>