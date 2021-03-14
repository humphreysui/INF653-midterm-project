<?php 

switch($action){
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
}