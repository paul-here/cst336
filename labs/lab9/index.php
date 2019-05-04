<?php

 if (!empty($_FILES)) {

    //print_r($_FILES);
    
    if ($_FILES['myFile']['size'] > 1048576){
        echo "<p>File is too large to upload.</p>";
        
    } else {
        move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
    }
    
    // echo "Image size: " . $_FILES['myFile']['size'];

}


    function displayImagesUploaded() {

        $images = scandir("gallery"); //returns all file names within a folder
        
        for ($i = 2; $i < count($images); $i++) {
            
            echo "<img src='gallery/$images[$i]' width='50' />";
            
        } // for
    
    } // function

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 9: File Upload </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />

    </head>
    <body>
        <h1>Lab 9: File Upload</h1>
        
        <br>
        <form  method="POST" enctype="multipart/form-data">
        
            <input type="file" name="myFile" />
            <button> Upload File! </button>
            
        </form>

        <br>
        
        <h3> Images uploaded: </h3>
        
        <br>
        
        <?= displayImagesUploaded() ?>
        
        
        <?php
        
        //include '../../inc/dbConnection.php';
        //$conn = getDatabaseConnection("c9");
        
        
        // $conn = dbConnection();
        
        ?>
    </body>
</html>