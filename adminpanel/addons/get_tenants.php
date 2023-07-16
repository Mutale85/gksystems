<?php 
    include("../../includes/db.php");

    $statement = $connect->prepare("SELECT * FROM tenants ");
    $statement->execute();
    $employees = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Return the employee data as JSON
    header('Content-Type: application/json');
    echo json_encode($employees);
    