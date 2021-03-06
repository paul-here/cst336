<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return;
    }
    
    include '_db_connection.php';
    $conn = get_database_connection("store");
    $sql = "SELECT catId, catName, catDesc FROM categories ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>