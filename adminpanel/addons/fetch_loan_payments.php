<?php
// Retrieve the loan ID
require '../../includes/db.php';
if(isset($_POST['loan_id'])){
    $loanId = $_POST['loan_id'];
    $query = "SELECT * FROM loan_payments WHERE loan_id = ?";
    $stmt = $connect->prepare($query);
    $stmt->execute([$loanId]);
    $loanPayments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $connect = null;

    // Display the loan payments in a table
    echo '<table class="table table-bordered">
            <tr>
                <th>Amount Paid</th>
                <th>Date Paid</th>
                <th>Balance</th>
            </tr>';
    foreach ($loanPayments as $payment) {
        echo '<tr>
                <td>' . $payment['currency'] . ' ' . $payment['amount'] . '</td>
                <td>' . $payment['date_paid'] . '</td>
                <td>' . $payment['balance'] . '</td>
            </tr>';
    }
    echo '</table>';
} 
?>
