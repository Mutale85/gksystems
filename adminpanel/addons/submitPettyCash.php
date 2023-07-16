<?php
require '../../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = date("Y-m-d", strtotime($_POST['date']));
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $transactionType = $_POST['transaction_type'];
    $paymentMode = $_POST['payment_mode'];
    // Calculate credit or debit based on the transaction type
    $date = formatDate($date);
    
    if ($transactionType == 'Cash In') {
        $balance = getBalance();
        $total_cash =  $balance + $amount;
        // $sql = $connect->prepare("INSERT INTO petty_cash (date, description, amount, total_cash) VALUES (?, ?, ?, ?) " );
        // $sql->execute([$date, $description, $amount, $total_cash]);
        $credit = $amount;
        $debit = 0.00;

        $sqlTransact = $connect->prepare("INSERT INTO `petty_cash_transactions`(`date`, `description`, `amount`, `transaction_type`, `debit`, `credit`, `balance`, `payment_mode`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
        $sqlTransact->execute([$date, $description, $amount, $transactionType, $debit, $credit, $total_cash, $paymentMode]);
        $query = $connect->prepare("UPDATE petty_cash SET total_cash = ? ");
        $query->execute([$total_cash]);
        // echo $balance;
        echo 'ZMW '. $amount .' Posted In';

    } elseif ($transactionType == 'Cash Out') {
        $balance = getBalance();
        $total_cash =  $balance - $amount;
        $credit = 0.00;
        $debit = $amount;
        $sqlTransact = $connect->prepare("INSERT INTO `petty_cash_transactions`(`date`, `description`, `amount`, `transaction_type`, `debit`, `credit`, `balance`, `payment_mode`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
        $sqlTransact->execute([$date, $description, $amount, $transactionType, $debit, $credit, $total_cash, $paymentMode]);
        $query = $connect->prepare("UPDATE petty_cash SET total_cash = ? ");
        $query->execute([$total_cash]);
        // echo $balance;
        echo 'ZMW '. $amount .' Posted out';

    }

}

