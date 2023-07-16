<?php
require '../../includes/db.php';
require '../../includes/conf.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $currency = $_POST['currency'];
    $incomeAmount = $_POST['incomeAmount'];
    $vehicleStatus = $_POST['vehicleStatus'];
    $driver = $_POST['driver'];
    $vehicle_reg_number = $_POST['vehicle_reg_number'];
    $confirmationCheck = isset($_POST['confirmationCheck']) ? 1 : 0;

    // Validate form data (you can add additional validation as per your requirements)
    if (empty($incomeAmount) || empty($vehicleStatus) || !$confirmationCheck) {
        // Handle validation error
        echo  'Please fill in all required fields and confirm the information.';
    } else {
        // Check for duplicate postings based on vehicle status
        try {
            
            $stmt = $connect->prepare("SELECT COUNT(*) FROM daily_income WHERE vehicle_status = ?");
            $stmt->execute([$vehicleStatus]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                // Handle duplicate posting
                echo  'A posting with the same vehicle status already exists.';
            } else {
                // Calculate and update the total_income
                try {
                    $stmt = $connect->prepare("SELECT SUM(income_amount) FROM daily_income");
                    $stmt->execute();
                    $totalIncome = $stmt->fetchColumn();

                    // If no previous records exist, the total_income will be null, so set it to 0
                    $totalIncome = $totalIncome ?? 0;

                    $newTotalIncome = $totalIncome + $incomeAmount;

                    $connect->beginTransaction();

                    $stmt = $connect->prepare("INSERT INTO daily_income (vehicle_reg_number, currency, income_amount, vehicle_status, confirmation_check, driver, total_income) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$vehicle_reg_number, $currency, $incomeAmount, $vehicleStatus, $confirmationCheck, $driver, $newTotalIncome]);

                    $connect->commit();
                    $driver  = getReporterByPhone($driver);
                    $message = $driver. ' has posted '.$currency .' ' .$incomeAmount;
                    $to = '+260970448181';
                    SEND_SMSNOW($to, $message, API, SENDER);
                    $to = '+260976330092';
                    $message = 'Hello '. $driver. ' you have posted '.$currency .' ' .$incomeAmount;
                    SEND_SMSNOW($to, $message, API, SENDER);

                    echo  'Form submitted successfully!';
                
                } catch (PDOException $e) {
                    // Rollback the transaction in case of error
                    $connect->rollBack();
                    echo  'Database error: ' . $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            // Handle database error
            echo  'Database error: ' . $e->getMessage();
        }
    }
} else {
    // Redirect or handle invalid form submission
    echo  'Invalid form submission.';

    
}
?>

