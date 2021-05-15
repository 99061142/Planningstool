<?php
	include("../code/functions.php");
	$id = $_GET["id"];
	$info = $_GET["info"];
	if($info === "update"){
		?>
		<h2>Als u iets wilt veranderen moet u de vakken veranderen</h2>
		<?php 
		}else{
		?>
		<h2>Weet u zeker dat u deze planning wilt verwijderen?</h2>
		<form method="post">
			<input type="submit" name="delete" value="Ja"/>
			<input type="submit" name="back" value="Nee"/>
		</form>
		

		<?php
		if(isset($_POST['delete'])) {
			delete_planner($id);
			?>
			<script>
            	window.location.href = "planning.php";
            	alert('Het verwijderen is gelukt');
        	</script>
        	<?php
	    }

	    else if(isset($_POST['back'])) {
        	?>
			<script>
            	window.location.href = "planning.php";
            	alert('Je hebt de planning niet verwijderd');
        	</script>
        	<?php
        }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<?php include("../include/styling_links.php"); ?>
</head>
<body>

</body>
</html>