<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$name = $_GET['name'];
$namedParameters = array();


$sql = "SELECT * FROM unsplash WHERE 1";  //Retrieves ALL records

if (!empty($name)) { // should happen every time
    $sql .=  " AND name LIKE :name";
    $namedParameters[":name"] = "$name";
}

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($records)) {
    // insert new row
    $sql = "INSERT INTO unsplash ( `name`, `frequency`) VALUES (:name, 1)";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($namedParameters);
    // prepare reply string "keyword has been searched 1 time"
    // overwrite records
    $records = array('name' => $name, 'frequency' => 1);
    
} else {
    // Find out how to access current frequency
    $frequency = $records[0]['frequency'] + 1;
    $namedParameters[":frequency"] = "$frequency";
    // update times searched
    $sql = "UPDATE unsplash
    SET frequency = :frequency
    WHERE  unsplash.name =  :name";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($namedParameters);
    // prepare reply string "artist has been searched X + 1 times"
    $records = array('name' => $name, 'frequency' => $frequency);
}

echo json_encode($records);
?>