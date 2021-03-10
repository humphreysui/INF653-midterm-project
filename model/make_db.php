<?php 
   
   function get_makeName_from_makes($makeID){
    global $db;
    $query = 'SELECT * FROM makes WHERE makeID = :makeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    $makeName = $make['makeName'];
    return $makeName;
  }

  function get_makes(){
    global $db;
    $query = 'SELECT * FROM makes ORDER BY makeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
  }

  function delete_make($makeID){
    global $db;
    $query = 'DELETE FROM makes WHERE makeID = :makeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_make($makeName){
    global $db;
    $query = 'INSERT INTO makes (makeName) VALUES (:makeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeName', $makeName);
    $statement->execute();
    $statement->closeCursor();
  }
   
