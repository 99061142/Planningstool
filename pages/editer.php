<?php
	include("../code/functions.php");
	$id = $_GET["id"];
	$info = $_GET["info"];
	$planning_editer = planning_editer($id);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<?php include("../include/styling_links.php"); ?>
</head>
	<body>
        <nav class="navbar navbar-expand-md">
            <h2 class="navbar-brand">Edit</h2>
            <?php include("../include/navbar.php"); ?>
        </nav>
        <div class="container-fluid">
	        <div class="row border border-dark bg-info all_planner_information">
	            <div class="col-3">
	       			<p><?= $planning_editer["game_name"] ?></p>
	            </div>      
	            <div class="col-2">
	                <p><?= ($planning_editer["game_date"]) ?></p>
	            </div> 
	            <div class="col-2">
	               	<p><?= substr($planning_editer["game_time"], 0, -3) ?></p>
	            </div> 
	            <div class="col-2">
	               	<p><?= $planning_editer["host"] ?></p>
	            </div>    
	            <div class="col-3">
	                <p><?= $planning_editer["players"] ?></p>
	            </div>                                                
	        </div>
	    </div>


        <?php if($info === "update"){ ?>
			<h2 class="text-center">Als u iets wilt veranderen moet u de vakken veranderen,</h2>
			<h4 class="text-center text-danger">U moet elke input invullen, ook al wilt u maar 1 ding veranderen</h4>
        	<form method="post" action="../code/planner/planner_edit.php?id=<?=$id ?>">
        		<div class="container-fluid row mt-3">
	        		<div class='col-1'>
	        			<p style="height: 31px">Datum: </p>
	        			<p style="height: 31px">Tijd: </p>
	        			<p style="height: 31px">Host: </p>
	        			<p style="height: 31px">Spelers: </p>
	        		</div>
	        		<div class='col'>
	          			<input class="mb-3" type="date" name="game_date"><br>
	          			<input class="mb-3" type="time" name="game_time"><br>
	          			<input class="mb-3" type="varchar" name="host"><br>
	          			<input class="mb-3" type="varchar" name="players"><br>
	        		</div>
	        	</div>
	        	<input type="submit">
        	</form>
		<?php }else{ ?>
			<h2 class="text-center">Weet u zeker dat u deze planning wilt verwijderen?</h2>
			<form method="post" class="text-center mt-5">
				<input class="px-5 py-2 mr-3" type="submit" name="delete" value="Ja"/>
				<input class="px-5 py-2" type="submit" name="back" value="Nee"/>
			</form>


			<?php if(isset($_POST["delete"])){ ?>
				<?= delete_planner($id); ?>
				<script>
	            	window.location.href = "planning.php";
	            	alert("Het verwijderen is gelukt");
	        	</script>
	        	<?php
	    	}
	    	else if(isset($_POST["back"])) { ?>
				<script>
	            	window.location.href = "planning.php";
	            	alert("Je hebt de planning niet verwijderd");
	        	</script>
	        	<?php
	        }
        }
  		?>
	</body>
</html>