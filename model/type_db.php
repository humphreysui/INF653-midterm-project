<?php 
   
   function get_typeName_from_types($typeID){
    global $db;
    $query = 'SELECT * FROM types WHERE typeID = :typeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    $typeName = $type['typeName'];
    return $typeName;
  }

   function get_types(){
    global $db;
    $query = 'SELECT * FROM types ORDER BY typeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
  }

  function delete_type($typeID){
    global $db;
    $query = 'DELETE FROM types WHERE typeID = :typeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_type($typeName){
    global $db;
    $query = 'INSERT INTO types (typeName) VALUES (:typeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeName', $typeName);
    $statement->execute();
    $statement->closeCursor();
  }
   
