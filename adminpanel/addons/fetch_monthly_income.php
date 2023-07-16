<?php
    // Fetch monthly income data from the database
    require '../../includes/db.php';
    try {
        

        $stmt = $connect->prepare("SELECT MONTH(created_at) AS month, SUM(income_amount) AS income FROM daily_income GROUP BY MONTH(created_at)");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $monthlyIncome = array_fill(0, 12, 0); // Initialize the array with 12 months and zero income

        foreach ($data as $row) {
            $month = (int)$row['month'];
            $income = (float)$row['income'];
            $monthlyIncome[$month - 1] = $income; // Subtract 1 to align month index with array index
        }

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($monthlyIncome);
        exit;
    } catch (PDOException $e) {
        // Handle database error
        echo "Database error: " . $e->getMessage();
        exit;
    }
?>
