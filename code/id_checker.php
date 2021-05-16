<?php
	include("functions.php");


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


  function id_planning_checker(){  
    $id = 0;
    if(isset($_GET["id"])){
      $id = $_GET["id"];
    }

    $appointment_Information = planning_editer($id);
    if(!$appointment_Information){
      header("location: index.php");
    }
  }


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