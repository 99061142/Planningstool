<?php
    include 'code/db_functions.php';
    $schedule = $_GET['schedule'];
    $oneGameID = $_GET['gameID'];
    $gameName = oneGameInformationFunction($oneGameID);
    $planning_Appointments_Information = planning_Appointments_Function($oneGameID);
    $appointment_Amount = appointment_Amount_Function();
    $appointment_Information = appointment_Information_Function();
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <?php if($schedule == true){ ?>
        <title>Planner - inplannen</title>
      <?php }else{ ?>
        <title>Planner</title>
      <?php }
    include 'include/styling.php' ?>
  </head>
  <body>
		<nav class='navbar navbar-expand-md'>
      <?php if($schedule == 'true'){ ?>
			  <h2 class='gameName'>Maak een afspraak voor de game <?php echo $gameName[0]['name']; ?></h2>
      <?php }else{ ?>
        <h2 class='gameName'>Planner</h2>
      <?php } 
		  include 'include/navbar.php' ?>
    </nav>
    <?php if($schedule == 'true'){ ?>
      <div>
        <button onclick="location.href='planner.php'">INPLANNEN</button>
        <button onclick="location.href='organise.php?gameID=<?php echo $oneGameID; ?>'">Teruggaan</button>
      </div>
    <?php }else{ ?>
      <div class="container">
        <?php foreach($appointment_Information as $row){ ?>
          <div style='height: 40px;' class='row border border-dark bg-info'>
            <div class="col-9 mt-2">
              <p class='game_Name'><?php echo $row['name']; ?></p>
            </div>
            <div class="col-3 mt-2">
              <a class='game_Detail_Link' href='organise.php?gameID=<?php echo $row['id']; ?>'>DETAILS VAN HET SPEL</a>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </body>
</html>