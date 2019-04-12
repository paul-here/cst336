<?php
    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    print_r($records);
    
    echo json_encode($records);
?>