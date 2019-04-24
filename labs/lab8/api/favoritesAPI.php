<?php

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("c9");
//receives these parameters: action, url, keyword
$action = $_POST['action'];
$url = $_POST['url'];
$keyword = $_POST['keyword'];

//TO GET THE 2 EXTRA POINTS IN THE HANDS-ON PORTION OF THE FINAL EXAM
//1. Add favorites to database
//2. Remove favorites from database
//3. Display the keyword list from database (use DISTINCT)

$arr = array();

    

  switch ($action) {
      
      case "add":
        $arr[":keyword"] = $keyword;
        $arr[":imageURL"] = $url;
        $sql = "INSERT INTO `lab8_pixabay` ( `imageURL`, `keyword`) 
                VALUES (:imageURL, :keyword)";
                 break;

      case "delete":
        $arr[":imageURL"] = $url;
        $sql = "DELETE FROM `lab8_pixabay` WHERE `lab8_pixabay`.`imageURL` = :imageURL";
                 break;
      case "favorites":
        $sql = "SELECT DISTINCT `keyword` FROM `lab8_pixabay` ORDER BY `keyword`";
                 break;
      default:
                 break;
  }//switch
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($records);
?>