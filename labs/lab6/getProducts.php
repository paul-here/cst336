<?php

// Database connection (there are 3 ways)
// Here is one of them: PDO

$host = "localhost";
$username = "root";
$password = "";
// Establishing the connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
// Printing out any errors: (see powerpoint and snag the line yooooo)


$sql = "SELECT * FROM om_product ORDER BY productPrice LIMIT 10";


$stmt = $dbConn -> prepare($sql);
$stmt -> execute();

?>