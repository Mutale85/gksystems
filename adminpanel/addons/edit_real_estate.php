<?php 
    include("../../includes/db.php");

    $real_estateId = $_POST['real_estate_id'];

    $query = $connect->prepare("SELECT * FROM estates WHERE estate_id = ?");
    $query->execute([$real_estateId]);
    $real_estateData = $query->fetch(PDO::FETCH_ASSOC);
    // header('Content-Type: application/json');
    // echo json_encode($real_estateData);

    // Fetch the image file names from the MySQL table
    $queryImages = $connect->prepare("SELECT image_path FROM estate_images WHERE estate_id = ?");
    $queryImages->execute([$real_estateId]);
    $imageData = $queryImages->fetchAll(PDO::FETCH_COLUMN);

    // Add the image file names to the real_estate data
    $real_estateData['images'] = $imageData;

    // Return the real_estate data as JSON
    header('Content-Type: application/json');
    echo json_encode($real_estateData);