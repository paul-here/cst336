<?php

session_start(); //starts or resumes an existing session

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM om_admin WHERE username = '$username' AND password = '$password'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we are expecting ONLY one record, so we use fetch instead of fetchAll

 if (empty($record)) {
     
     echo "Username or Password are incorrect!";
     
     
 }  else {
 
    header('location: admin.php'); //redirecting to a new file
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];

 }

?>