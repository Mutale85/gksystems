<?php
    include("../../includes/db.php");

    $sql = "SELECT 
                DATE_FORMAT(added_on, '%Y-%m') AS month,
                SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) AS income,
                SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) AS expense
            FROM transactions
            GROUP BY month
            ORDER BY month ASC";

    // Execute the query
    $stmt = $connect->query($sql);

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Initialize arrays to store the data
    $months = [];
    $incomeData = [];
    $expenseData = [];
    $profitLossData = [];

    // Iterate over the results and populate the arrays
    foreach ($results as $result) {
        $months[] = $result['month'];
        $incomeData[] = floatval($result['income']);
        $expenseData[] = floatval($result['expense']);
        $profitLossData[] = floatval($result['income']) - floatval($result['expense']);
    }

    // Prepare the data to be sent as JSON
    $jsonData = [
        'months' => $months,
        'incomeData' => $incomeData,
        'expenseData' => $expenseData,
        'profitLossData' => $profitLossData
    ];

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($jsonData);
    
