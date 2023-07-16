<?php
    require '../../includes/db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $loanType = filter_input(INPUT_POST, 'loanType', FILTER_SANITIZE_SPECIAL_CHARS);
        $creditor = filter_input(INPUT_POST, 'creditor', FILTER_SANITIZE_SPECIAL_CHARS);
        $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_SPECIAL_CHARS);
        $currency = filter_input(INPUT_POST, 'currency', FILTER_SANITIZE_SPECIAL_CHARS);
        $dueDate = filter_input(INPUT_POST, 'dueDate', FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
        $loanId = filter_input(INPUT_POST, 'loan_id', FILTER_SANITIZE_SPECIAL_CHARS);
        $dueDate = formatDate($dueDate);

        if (empty($loanId)) {
            // Insert a new payment
            $sql = $connect->prepare("INSERT INTO loans (loan_type, creditor, amount, currency, due_date, status) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->execute([$loanType, $creditor, $amount, $currency, $dueDate, $status]);
            echo "Loan saved successfully!";
        } else {
            // Update the existing loan record
            $stmt = $connect->prepare("UPDATE loans SET loan_type = ?, creditor = ?, amount = ?, currency = ?, due_date = ?, status = ? WHERE id = ?");
            $stmt->execute([$loanType, $creditor, $amount, $currency, $dueDate, $status, $loanId]);
            echo "Loan updated successfully!";
        }

        // Schedule a reminder 10 days before the due date
        $reminderDate = date('Y-m-d', strtotime('-10 days', strtotime($dueDate)));
        // Here, you can implement your code to send a reminder email or notification
        
    }

?>
