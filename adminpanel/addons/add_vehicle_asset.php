<?php 
    require "../../includes/db.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Sanitize and retrieve form data
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
        $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_SPECIAL_CHARS);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS);
        $licensePlate = filter_input(INPUT_POST, 'license_plate', FILTER_SANITIZE_SPECIAL_CHARS);
        $vin = filter_input(INPUT_POST, 'vin', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchaseDate = filter_input(INPUT_POST, 'purchase_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchasePrice = filter_input(INPUT_POST, 'purchase_price', FILTER_SANITIZE_SPECIAL_CHARS);
        $currency = filter_input(INPUT_POST, 'currency', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchaseMileage = filter_input(INPUT_POST, 'purchase_mileage', FILTER_SANITIZE_SPECIAL_CHARS);
        $driver = filter_input(INPUT_POST, 'driver', FILTER_SANITIZE_SPECIAL_CHARS);
        $purchaseDate = formatDate($purchaseDate);

        // Check if vehicle_id is provided
        if (!empty($_POST['vehicle_id'])) {
            // Update details in the vehicles table
            $vehicleId = $_POST['vehicle_id'];
            $stmt = $connect->prepare("UPDATE vehicles SET year = ?, make = ?, model = ?, color = ?, license_plate = ?, vin = ?, purchase_date = ?, currency = ?, purchase_price = ?, purchase_mileage = ?, driver = ? WHERE id = ?");
            $stmt->execute([$year, $make, $model, $color, $licensePlate, $vin, $purchaseDate, $currency, $purchasePrice, $purchaseMileage, $driver, $vehicleId]);
        } else {
            // Insert vehicle data into the vehicles table
            $stmt = $connect->prepare("INSERT INTO vehicles (year, make, model, color, license_plate, vin, purchase_date, currency, purchase_price, purchase_mileage, driver) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$year, $make, $model, $color, $licensePlate, $vin, $purchaseDate, $currency, $purchasePrice, $purchaseMileage, $driver]);

            // Get the last inserted vehicle ID
            $vehicleId = $connect->lastInsertId();
        }

        // Check if images are provided
        if (!empty($_FILES['images']['tmp_name'][0])) {
            // Delete existing images for the vehicle (optional step)
            $stmt = $connect->prepare("DELETE FROM vehicle_images WHERE vehicle_id = ?");
            $stmt->execute([$vehicleId]);

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
                    // Store the image path in the vehicle_images table
                    $stmt = $connect->prepare("INSERT INTO vehicle_images (vehicle_id, license_plate, image_path) VALUES (?, ?, ?)");
                    $stmt->execute([$vehicleId, $license_plate, $imagePath]);

                    $imagePaths[] = $imagePath;
                }
            }
        }

        // Redirect back to index.php after successful insertion
        // header('Location: index.php');
        exit();
    }
?>
