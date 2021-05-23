<?php
  // Checks if there is a game with the id the link has given
	function id_game_checker(){  
    $id = 0;
    if(isset($_GET["id"])){
      $id = $_GET["id"];
    }

    $one_game_Information = one_game_Information($id);
    if(!$one_game_Information){
      header("location: index.php");
    }
  }


  // Checks if there is a game that is planned with the id the link has given
  function id_planning_checker(){  
    $id = 0;
    if(isset($_GET["id"])){
      $id = $_GET["id"];
    }

    $appointment_Information = one_Planning_Information($id);
    if(!$appointment_Information){
      header("location: index.php");
    }
  }


  // Checks if the link has given the variable "update" or "delete"
  function info_checker(){
    $info = "";
    if(isset($_GET["info"])){
      $info = $_GET["info"];
    }


    if($info !== "update" && $info !== "delete"){
      header("location: index.php");
    }    
  }
?>  	