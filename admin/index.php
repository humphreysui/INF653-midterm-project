<!--  
admin page:
1. require models 
2. get required data from models (makes, types, classes)
3. get parameter data sent to the controller and now here is the change... 
4. routing to the sub-controllers happens
-->

<?php 
  require('../model/database.php');
  require('../model/vehicle_db.php');
  require('../model/make_db.php');
  require('../model/type_db.php');
  require('../model/class_db.php');

  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
  $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT); 
  $model = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_STRING);
  
  $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
  if(!$makeID){
    $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
  }
  $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
  if(!$typeID){
    $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
  }
  $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
  if(!$classID){
    $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
  }
  /*vehicleID parameters*/
  $vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);
  if(!$vehicleID){
    $vehicleID = filter_input(INPUT_GET, 'vehicleID', FILTER_VALIDATE_INT);
  }
  /*makeName parameters*/
  $makeName = filter_input(INPUT_GET, 'makeName', FILTER_SANITIZE_STRING);
  /*typeName parameters*/
  $typeName = filter_input(INPUT_GET, 'typeName', FILTER_SANITIZE_STRING);
  /*className parameters*/
  $className = filter_input(INPUT_GET, 'className', FILTER_SANITIZE_STRING);

  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
      $action = 'list_vehicles';
    }
  }

  switch ($action){

    case "list_vehicles":
      $makes = get_makes();
      $types = get_types();
      $classes = get_classes();

      if($makeID){
        $vehicles = get_vehicles_by_make($makeID);
      }else if($typeID){
        $vehicles = get_vehicles_by_type($typeID);
      }else if($classID){
        $vehicles = get_vehicles_by_class($classID);
      }else{
        $vehicles = get_vehicles();
      }
      include('./view/vehicle_list.php');
      break;

    case "list_vehicles_by_price":
      $makes = get_makes();
      $types = get_types();
      $classes = get_classes();
      $vehicles = sort_vehicles_by_price();
      include('./view/vehicle_list.php');
      break;

    case "list_vehicles_by_year":
      $makes = get_makes();
      $types = get_types();
      $classes = get_classes();
      $vehicles = sort_vehicles_by_year();
      include('./view/vehicle_list.php');
      break;

    /* vehichle controller*/
    case "delete_vehicle":
      include('controllers/vehicle_controller.php'); 
      break;
    case 'show_vehicle_form':
      $makes = get_makes();
      $types = get_types();
      $classes = get_classes();
      include('./view/add_vehicle.php');  
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

    /* makes controller*/
    case "show_make_form":
      $makes = get_makes();
      include('view/makes.php');
      break;
    case "add_make":
      add_make($makeName);
      header('Location: .?action=show_make_form');
      break;
    case "delete_make":
      if($makeID){
        try{
          delete_make($makeID);
        }catch(PDOException $e){
          $errorMessage = "You can't delete make when vehicle exits in the make database.";
          include('view/error.php');
          exit();
        }
        header('Location: .?action=show_make_form');
      }else{
        $errorMessage='incorrect vehicle make data.';
        include('view/error.php');
        exit();
      }
      break;
    
    /* types controller*/
    case "show_type_form":
      $types = get_types();
      include('view/types.php');
      break;
    case "add_type":
      add_type($typeName);
      header('Location: .?action=show_type_form');
      break;
    case "delete_type":
      if($typeID){
        try{
          delete_type($typeID);
        }catch(PDOException $e){
          $errorMessage = "You can't delete type when vehicle exits in the type database.";
          include('view/error.php');
          exit();
        }
        header('Location: .?action=show_type_form');
      }else{
        $errorMessage='incorrect vehicle type data.';
        include('view/error.php');
        exit();
      }
      break;

    /* classes controller*/
    case "show_class_form":
      $classes = get_classes();
      include('view/classes.php');
      break;
    case "add_class":
      add_class($className);
      header('Location: .?action=show_class_form');
      break;
    case "delete_class":
      if($classID){
        try{
          delete_class($classID);
        }catch(PDOException $e){
          $errorMessage = "You can't delete class when vehicle exits in the class database.";
          include('view/error.php');
          exit();
        }
        header('Location: .?action=show_class_form');
      }else{
        $errorMessage='incorrect vehicle class data.';
        include('view/error.php');
        exit();
      }
      break;  




    // default
    default:
      $makes = get_makes();
      $types = get_types();
      $classes = get_classes();
      $vehicles = get_vehicles();
      include('./view/vehicle_list.php');
  
  }