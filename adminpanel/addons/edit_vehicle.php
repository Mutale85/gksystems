<?php 
    include("../../includes/db.php");

    $vehicleId = $_POST['vehicle_id'];

    $query = $connect->prepare("SELECT * FROM vehicles WHERE id = ?");
    $query->execute([$vehicleId]);
    $vehicleData = $query->fetch(PDO::FETCH_ASSOC);
    // header('Content-Type: application/json');
    // echo json_encode($vehicleData);

    // Fetch the image file names from the MySQL table
    $queryImages = $connect->prepare("SELECT image_path FROM vehicle_images WHERE vehicle_id = ?");
    $queryImages->execute([$vehicleId]);
    $imageData = $queryImages->fetchAll(PDO::FETCH_COLUMN);

    // Add the image file names to the vehicle data
    $vehicleData['images'] = $imageData;

    // Return the vehicle data as JSON
    header('Content-Type: application/json');
    echo json_encode($vehicleData);