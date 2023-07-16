<?php 
    require "../../includes/db.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and retrieve form data
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        $condition = filter_input(INPUT_POST, 'condition', FILTER_SANITIZE_SPECIAL_CHARS);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchase_amount = filter_input(INPUT_POST, 'purchase_amount', FILTER_SANITIZE_SPECIAL_CHARS);
        $current_value = filter_input(INPUT_POST, 'current_value', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchase_date = filter_input(INPUT_POST, 'purchase_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $rental_amount = filter_input(INPUT_POST, 'rental_amount', FILTER_SANITIZE_SPECIAL_CHARS);
        $current_state = filter_input(INPUT_POST, 'current_state', FILTER_SANITIZE_SPECIAL_CHARS);
        $currency = filter_input(INPUT_POST, 'currency', FILTER_SANITIZE_SPECIAL_CHARS);
        $estateId = filter_input(INPUT_POST, 'estate_id', FILTER_SANITIZE_SPECIAL_CHARS);

        $purchase_date = formatDate($purchase_date);

        // Check if estate_id is provided
        if (!empty($_POST['estate_id'])) {
            // Update details in the estates table
            $estatesId = $_POST['estate_id'];
            $stmt = $connect->prepare("UPDATE estates SET `category` = ?, `condition` = ?, `location` = ?, `address` = ?, `currency` = ?, `purchase_amount` = ?, `current_value` = ?, `purchase_date` = ?, `rental_amount` = ?, `current_state` = ? WHERE estate_id = ?");
            $stmt->execute([$category, $condition, $location, $address, $currency, $purchase_amount, $current_value, $purchase_date, $rental_amount, $current_state, $estatesId]);
        } else {
            $stmt = $connect->prepare("INSERT INTO estates (`category`, `condition`, `location`, `address`, `currency`, `purchase_amount`, `current_value`, `purchase_date`, `rental_amount`, `current_state`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$category, $condition, $location, $address, $currency, $purchase_amount, $current_value, $purchase_date, $rental_amount, $current_state]);
            // Get the last inserted estates ID
            $estatesId = $connect->lastInsertId();
        }

        // Check if images are provided
        if (!empty($_FILES['images']['tmp_name'][0])) {
            // Delete existing images for the estates (optional step)
            $stmt = $connect->prepare("DELETE FROM estate_images WHERE estate_id = ?");
            $stmt->execute([$estatesId]);

            // Process image uploads
            $imagePaths = [];
            $targetDir = 'uploads/';

            // Loop through each uploaded image
            foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
                $fileName = $_FILES['images']['name'][$index];
                $targetFile = $targetDir . basename($fileName);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Generate a unique filename (e.g., using timestamp or UUID) to avoid naming conflicts
                $uniqueFilename = uniqid() . '.' . $imageFileType;
                $imagePath = $targetDir . $uniqueFilename;

                if (move_uploaded_file($tmpName, $imagePath)) {
                    // Store the image path in the estates_images table
                    $stmt = $connect->prepare("INSERT INTO estate_images (estate_id, image_path) VALUES (?, ?)");
                    $stmt->execute([$estatesId, $imagePath]);

                    $imagePaths[] = $imagePath;
                }
            }

            echo "Estates Asset Saved to DB";
        }

        exit();
    }
?>
