<?php
require '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orphan_id = $_POST['orphan_id'];

    // Fetch the orphan from the database
    $stmt = $connect->prepare('SELECT * FROM orphans WHERE id = :id');
    $stmt->execute(['id' => $orphan_id]);
    $orphan = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the orphan data as JSON
    header('Content-Type: application/json');
    echo json_encode($orphan);
}
?>
