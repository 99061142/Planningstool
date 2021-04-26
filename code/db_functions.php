<?php
	// Game database function
	function db_connection_function(){
		$connectionMaker = "mysql:host=localhost;dbname=mbob3w7-8-9";
    	$username = "root";
   	 	$password = "mysql";
    	$connection = new PDO($connectionMaker, $username, $password);
    	return $connection;
	}


	// Games database 


    // Game amount function
    function gameAmountFunction(){
        $connection = db_connection_function();
        $gameAmountCode = "SELECT count(id) AS amount FROM games";


        $gameAmountCode = $connection->prepare($gameAmountCode);
        $gameAmountCode->execute();
        $gameAmount = $gameAmountCode->fetch();
        return $gameAmount;
    }


    // Game name function
    function homepageFunction(){
        $connection = db_connection_function();
        $gameNameCode = "SELECT id, name FROM games ORDER BY name";


        $gameNameCode = $connection->prepare($gameNameCode);
        $gameNameCode->execute();
        $gamesNames = $gameNameCode->fetchAll();
        return $gamesNames;
    }


    // One game information 
    function oneGameInformationFunction($oneGameID){
        $connection = db_connection_function();
        $oneGameIDCode = "SELECT * FROM games WHERE id = :oneGameID";

        $oneGameIDCode = $connection->prepare($oneGameIDCode);
        $oneGameIDCode->execute(array(':oneGameID' => $oneGameID));
        $oneGameInformation = $oneGameIDCode->fetchAll();
        return $oneGameInformation;
    }




    // Planner database


    // Appointment amount
    function appointment_Amount_Function(){
        $connection = db_connection_function();
        $appointmentAmountCode = "SELECT count(id) AS amount FROM games";


        $appointmentAmountCode = $connection->prepare($appointmentAmountCode);
        $appointmentAmountCode->execute();
        $appointment_Amount = $appointmentAmountCode->fetch();
        return $appointment_Amount;
    }


    // All the appointment information
    function appointment_Information_Function(){
        $connection = db_connection_function();
        $appointment_Information_Code = "SELECT * FROM planning";

        $appointment_Information_Code = $connection->prepare($appointment_Information_Code);
        $appointment_Information_Code->execute();
        $appointment_Information = $appointment_Information_Code->fetchAll();
        return $appointment_Information;
    }



    // All the appointments for the games
    function planning_Appointments_Function($oneGameID){
        $connection = db_connection_function();
        $planningAppointmentsCode = "SELECT * FROM planning WHERE id = :oneGameID";

        $planningAppointmentsCode = $connection->prepare($planningAppointmentsCode);
        $planningAppointmentsCode->execute(array(':oneGameID' => $oneGameID));
        $planning_Appointments_Information = $planningAppointmentsCode->fetchAll();
        return $planning_Appointments_Information;
    }
?>