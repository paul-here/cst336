<?php

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("c9");
//receives these parameters: action, url, keyword
$action = $_GET['action'];
$url = $_GET['url'];
$keyword = $_GET['keyword'];

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
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr);
                 break;

      case "delete":
        $arr[":imageURL"] = $url;
        $sql = "DELETE FROM `lab8_pixabay` WHERE `lab8_pixabay`.`imageURL` = :imageURL";
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr);
                 break;
                 
      case "keyword":
        $sql = "SELECT DISTINCT `keyword` FROM `lab8_pixabay` ORDER BY `keyword`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
                 break;
                 
      case "favorites":
        $arr[":keyword"] = $keyword;
        $sql = "SELECT `imageURL` FROM `lab8_pixabay` WHERE `lab8_pixabay`.`keyword` = :keyword";
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr);
                 break;
                 
      default:
                 break;
  } // switch
  
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($records);
?>