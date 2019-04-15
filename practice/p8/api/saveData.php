<?php
    include 'DBConnection.php';
    session_start();
    //TODO: Save incoming data into session
    foreach($_POST as $key => $value){
        $_SESSION[$key] = $value;
    }
    
    // I don't know how
    
    if(!isset($_SESSION["progress"])){
        $_SESSION["progress"] = 0;
    }
    
    echo json_encode($_SESSION);
?>