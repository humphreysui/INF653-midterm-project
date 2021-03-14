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
        add_vehicle($makeID, $typeID, $classID, $year, $model, $price);
        header('location:.');
      }else{
        $errorMessage='incorrect vehicle data';
        include('../view/error.php');
        exit();
      } 
      break;
    
    case 'show_vehicle_form':
      $makes = get_makes();
      $types = get_types();
      $classes = get_classes();
      include('./view/add_vehicle.php');  
      break;
    
  }