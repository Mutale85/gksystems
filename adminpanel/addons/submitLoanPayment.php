<?php
    require '../../includes/db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $loanId = $_POST['loanId'];
        $currency = $_POST['currency'];
        $amountPaid = $_POST['amount'];
        $datePaid = formatDate($_POST['datePaid']);

        $query = $connect->prepare("SELECT * FROM loans WHERE id = ?");
        $query->execute([$loanId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $amount = $result['amount'];
        $balance = $amount - $amountPaid;
        $sql = $connect->prepare("INSERT INTO loan_payments (loan_id, currency, amount, date_paid, balance) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$loanId, $currency, $amountPaid, $datePaid, $balance]);
        // we also update the loan amount from loans table
        $update = $connect->prepare("UPDATE loans SET amount = ? WHERE id = ? ");
        $update->execute([$balance, $loanId]);
        echo "Payment added successfully!";
    }

?>

