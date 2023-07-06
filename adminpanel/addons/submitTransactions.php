<?php
    require "../../includes/db.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $added_by = $_SESSION['phonenumber'];
        $transaction_id = $_POST['transaction_id'];
        if(empty($transaction_id)){
            $sql = "SELECT COUNT(*) AS count FROM transactions WHERE amount = ? AND description = ? AND type = ? AND added_by = ? AND added_on >= DATE_SUB(NOW(), INTERVAL 1 HOUR)";
            $stmt = $connect->prepare($sql);
            $stmt->execute([$amount, $description, $type, $added_by]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                // Duplicate entry found
                $response = ['status' => 'error', 'message' => 'Duplicate entry.'];
                echo json_encode($response);
                exit;
            }
            
            $sql = "INSERT INTO transactions (amount, description, type, added_by) VALUES (?, ?, ?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->execute([$amount, $description, $type, $added_by]);

            // Return a success message to the Ajax request
            $response = ['status' => 'success', 'message' => 'Transaction added successfully'];
            echo json_encode($response);
        }else{
            $update = $connect->prepare("UPDATE transactions SET amount = ?, description = ?, type = ?, added_by = ? WHERE id = ?");
            
            $update->execute([$amount, $description, $type, $added_by, $transaction_id]);

            // Return a success message to the Ajax request
            $response = ['status' => 'success', 'message' => 'Transaction updated successfully'];
            echo json_encode($response); 
        }
    }
?>
