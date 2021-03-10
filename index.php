<!-- 
1. require the models
2. get required data from the models - makes, types, classes 
3. get parameter data sent to the controller from forms 
4. get the data for the view - the precedence of make, type, and class - the 3 drop menus to make selections from. - you could do if make / else if type / else if class / else return all
5. show the view
-->

<?php 
  require('model/database.php');
  require('model/vehicle_db.php');
  require('model/make_db.php');
  require('model/type_db.php');
  require('model/class_db.php');

  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
  $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT); 
  $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
  
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
      $vehicles = sort_vehicles_by_price();
      include('./view/vehicle_list.php');
      break;

    case "list_vehicles_by_year":
      $vehicles = sort_vehicles_by_year();
      include('./view/vehicle_list.php');
      break;

    default:
      $vehicles = get_vehicles();
      include('./view/vehicle_list.php');
  
  }