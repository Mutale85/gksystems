<?php 
    include("../../includes/db.php");

    $house_number = $_POST['house_number'];

    $query = $connect->prepare("SELECT * FROM estates WHERE address = ?");
    $query->execute([$house_number]);
    $real_estateData = $query->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($real_estateData);
?>