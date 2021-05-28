<?php  
	$info = $_GET["info"];


	// Add the game to the planning
    if($info == "added"){
        echo "U heeft de game toegevoegd";
    }
	else if($info == "addedError"){
    	echo "U heeft de game niet toegevoegd";
	}


    // The user updated a game in the planning
    else if($info == "updated"){
        echo "U heeft de game geupdate";
    }
    else if($info == "updatedError"){
        echo "U heeft de game niet geupdate";
    }


	// Delete the game out of the planning
    else if($info == "deleted"){
        echo "U heeft de game verwijderd";
    }
    else if($info == "deletedError"){
        echo "U heeft de game niet verwijderd";
    }
?>