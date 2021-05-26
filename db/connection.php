<?php
	function game_db_conn(){
		try{
  			$connection = new PDO("mysql:host=localhost;dbname=mbob3w7-8-9", "root", "mysql");
  			// set the PDO error mode to exception
  			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  			return $connection;
		}catch(PDOException $e){
  			echo "Connection failed: " . $e->getMessage();
		}
	}
?>