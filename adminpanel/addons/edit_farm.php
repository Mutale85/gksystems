<?php 
    include("../../includes/db.php");

    $farmId = $_POST['farm_id'];

    $query = $connect->prepare("SELECT * FROM farms WHERE farm_id = ?");
    $query->execute([$farmId]);
    $farmData = $query->fetch(PDO::FETCH_ASSOC);
    // header('Content-Type: application/json');
    // echo json_encode($farmData);

    // Fetch the image file names from the MySQL table
    $queryImages = $connect->prepare("SELECT image_path FROM farm_images WHERE farm_id = ?");
    $queryImages->execute([$farmId]);
    $imageData = $queryImages->fetchAll(PDO::FETCH_COLUMN);

    // Add the image file names to the farm data
    $farmData['images'] = $imageData;

    // Return the farm data as JSON
    header('Content-Type: application/json');
    echo json_encode($farmData);