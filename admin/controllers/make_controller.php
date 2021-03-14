<?php 

switch ($action){
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
  
}