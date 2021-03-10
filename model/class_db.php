<?php 
   
   function get_className_from_classes($classID){
    global $db;
    $query = 'SELECT * FROM classes WHERE classID = :classID';
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    $className = $class['className'];
    return $className;
  }

   function get_classes(){
    global $db;
    $query = 'SELECT * FROM classes ORDER BY classID';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
  }

  function delete_class($classID){
    global $db;
    $query = 'DELETE FROM classes WHERE classID = :classID';
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_class($className){
    global $db;
    $query = 'INSERT INTO classes (className) VALUES (:className)';
    $statement = $db->prepare($query);
    $statement->bindValue(':className', $className);
    $statement->execute();
    $statement->closeCursor();
  }
   
