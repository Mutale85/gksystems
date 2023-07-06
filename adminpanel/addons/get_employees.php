<?php 
    include("../../includes/db.php");

    $user_role = 'employee';
    $statement = $connect->prepare("SELECT * FROM team_members WHERE user_role = ?");
    $statement->execute([$user_role]);
    $employees = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Return the employee data as JSON
    header('Content-Type: application/json');
    echo json_encode($employees);
    