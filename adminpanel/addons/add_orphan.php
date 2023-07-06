<?php
require '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $names = filter_input(INPUT_POST, 'names', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
    $caretakerId = filter_input(INPUT_POST, 'caretakerId', FILTER_SANITIZE_SPECIAL_CHARS);

  // Save the uploaded photo
    $photoPath = '';
    if (!empty($_FILES['photo']['name'])) {
        $photoName = $_FILES['photo']['name'];
        $photoTmp = $_FILES['photo']['tmp_name'];
        $photoPath = 'photos/' . $photoName;
        move_uploaded_file($photoTmp, $photoPath);
    }

    // Add orphan
    $orphanId = addOrphan($photoPath, $names, $age, $gender, $caretakerId);

    if ($orphanId) {
        echo 'Orphan added successfully!'; // You can return a success message
    } else {
        echo 'Failed to add orphan.'; // You can return an error message
    }
}
?>

