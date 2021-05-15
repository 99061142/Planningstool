<?php
	include("../code/functions.php");
	$appointment_Amount = appointment_Amount();
	$appointment_information = appointment_Information();
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Planning</title>
		<?php include("../include/styling_links.php"); ?>
	</head>
	<body class="bg-secondary">
	    <nav class="navbar navbar-expand-md">
	        <h2 class="navbar-brand">Er is/zijn <?= $appointment_Amount ?> game(s) ingepland</h2>
	        <?php include("../include/navbar.php"); ?>
	    </nav>
	    <div class="container-fluid">
            <?php foreach($appointment_information as $game_information){ ?>
                <div class="row border border-dark bg-info all_planner_information">
                    <div class="col">
       					<p><?= $game_information["game_name"] ?></p>
                    </div>      
                    <div class="col">
                        <p><?= $game_information["game_date"] ?></p>
                    </div> 
                    <div class="col">
                        <p><?= $game_information["game_time"] ?></p>
                    </div> 
                    <div class="col">
                        <p><?= $game_information["host"] ?></p>
                    </div>    
                    <div class="col">
                        <p><?= $game_information["players"] ?></p>
                    </div> 
                    <div class="col planner_links">
                        <a class="text-decoration-none mr-4" href="update_question.php?id=<?= $game_information["id"] ?>&info=update">Bewerk</a>
                        <a class="text-decoration-none" href="update_question.php?id=<?= $game_information["id"] ?>&info=delete">Verwijder</a>
                    </div>                                                 
                </div>
            <?php } ?>
        </div>
	</body>
</html>