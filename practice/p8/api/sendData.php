<?php

include 'DBConnection.php';

session_start();
$conn = getDBConnection();

// TODO: Grab all of our paramters from the session
print_r($_SESSION);
    //$parameters[":name"]= $_SESSION["name"];

$name = $_SESSION["name"];
$major = $_SESSION["major"];
$email = $_SESSION["email"];
$zip = $_SESSION["zip"];

// TODO: Execute SQL to add a row to database table
// This doesn't work, and I don't know why.
$sql = "INSERT INTO `users` (`name`, `major`, `email`, `zip`) VALUES ($name, $major, $email, $zip)";
$stmt = $conn->prepare($sql);
$stmt->execute();
    //$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Destory the session once you submit
session_destroy();

// TODO: Return all the rows from the datable table



?>
