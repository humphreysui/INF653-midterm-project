<?php 
  
  switch ($action){

    case "delete_vehicle":
      // #TODO: try-catch error 
      if($vehicleID){
        delete_vehicle($vehicleID);
        header('location:.');
      }else{
        $errorMessage='incorrect vehicleID';
        include('../view/error.php');
        exit();
      } 
      break;
    
    case "add_vehicle":
    
      if($year && $model && $price && $typeID && $makeID && $classID){
        add_vehicle($year, $model, $price, $typeID, $makeID, $classID);
        header('location:.');
      }else{
        $errorMessage='incorrect vehicle data';
        include('../view/error.php');
        exit();
      } 
      break;
    
  }