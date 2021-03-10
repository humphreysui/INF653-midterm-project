<?php 

  $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
  $username = 'root';
  $password = 'sesame';

  try{
    $db = new PDO ($dsn, $username, $password);
  }catch (PDOException $e){
    $errorMessage = 'Database Error: ';
    $errorMessage .= $e->getMessage();
    include('./view/error.php');
    exit();
  }