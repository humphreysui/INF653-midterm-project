<?php 

  function get_vehicles(){
    global $db;
    $query = 'SELECT * FROM vehicles';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  function get_vehicles_by_make($makeID){
    global $db;
    $query = 'SELECT * FROM vehicles V
              LEFT JOIN makes M
              ON V.makeID = M.makeID
              WHERE V.makeID = :makeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;

  }

  function get_vehicles_by_type($typeID){
    global $db;
    $query = 'SELECT * FROM vehicles V
              LEFT JOIN types T
              ON V.typeID = T.typeID
              WHERE V.typeID = :typeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;

  }

   function get_vehicles_by_class($classID){
    global $db;
    $query = 'SELECT * FROM vehicles V
              LEFT JOIN classes C
              ON V.classID = C.classID
              WHERE V.classID = :classID';
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;

  }

  function sort_vehicles_by_price(){
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY price';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  function sort_vehicles_by_year(){
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY year';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  function delete_vehicle($vehicleID){
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_vehicle($makeID, $typeID, $classID, $year, $model, $price){
    global $db;
    $query = 'INSERT INTO vehicles 
              (year, model, price, typeID, classID, makeID) 
              VALUES 
              (:year, :model, :price, :typeID, :classID, :makeID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':typeID', $typeID);
    $statement->bindValue(':classID', $classID);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $statement->closeCursor();
  }