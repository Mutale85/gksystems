<?php
require '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orphan_id = $_POST['orphan_id'];
    $stmt = $connect->prepare('DELETE FROM orphans WHERE id = :id');
    $stmt->execute(['id' => $orphan_id]);
    
    echo "Orphan deleted from the database";
}
?>
