<?php
	include('functions.php');
	  
  	$game_id = 0;
  	if(isset($_GET['id'])){
    	$game_id = $_GET['id'];
  	}

  	$one_game_Information = one_game_Information($game_id);
  	if(!$one_game_Information){
    	header('location: index.php');
  	}
?>  	