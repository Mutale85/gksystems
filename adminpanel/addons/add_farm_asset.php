<?php 
    require "../../includes/db.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Sanitize and retrieve form data
        $activity = filter_input(INPUT_POST, 'activity', FILTER_SANITIZE_SPECIAL_CHARS);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $current_value = filter_input(INPUT_POST, 'current_value', FILTER_SANITIZE_SPECIAL_CHARS);
        $farm_size = filter_input(INPUT_POST, 'farm_size', FILTER_SANITIZE_NUMBER_INT);
        $purchase_date = filter_input(INPUT_POST, 'purchase_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchase_amount = filter_input(INPUT_POST, 'purchase_amount', FILTER_SANITIZE_SPECIAL_CHARS);
        $currency = filter_input(INPUT_POST, 'currency', FILTER_SANITIZE_SPECIAL_CHARS);
        $measurement = filter_input(INPUT_POST, 'measurement', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchase_date = formatDate($purchase_date);

        // Check if farm_id is provided
        if (!empty($_POST['farm_id'])) {
            // Update details in the farms table
            $farmId = $_POST['farm_id'];
            $stmt = $connect->prepare("UPDATE farms SET `activity` = ?, `location` = ?, `address` = ?, `currency` = ?, `purchase_amount` = ?, `current_value` = ?, `purchase_date` = ?, `measurement` = ?, `farm_size` = ? WHERE farm_id = ?");
            $stmt->execute([$activity, $location, $address, $currency, $purchase_amount, $current_value, $purchase_date, $measurement, $farm_size, $farmId]);
        } else {
            $stmt = $connect->prepare("INSERT INTO farms (`activity`, `location`, `address`, `currency`, `purchase_amount`, `current_value`, `purchase_date`, `measurement`, `farm_size`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$activity, $location, $address, $currency, $purchase_amount, $current_value, $purchase_date, $measurement, $farm_size]);
            // Get the last inserted farm ID
            $farmId = $connect->lastInsertId();
        }

        // Check if images are provided
        if (!empty($_FILES['images']['tmp_name'][0])) {
            // Delete existing images for the farm (optional step)
            $stmt = $connect->prepare("DELETE FROM farm_images WHERE farm_id = ?");
            $stmt->execute([$farmId]);

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
                    // Store the image path in the farm_images table
                    $stmt = $connect->prepare("INSERT INTO farm_images (farm_id, image_path) VALUES (?, ?)");
                    $stmt->execute([$farmId, $imagePath]);

                    $imagePaths[] = $imagePath;
                }
            }

            echo "Farm Asset Saved to DB";
        }

        exit();
    }
?>
