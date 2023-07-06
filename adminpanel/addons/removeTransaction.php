<?php 
    include("../../includes/db.php");

    if(isset($_POST['transaction_id'])){
        $transaction_id = preg_replace("#[^0-9]#", "", $_POST['transaction_id']) ;
        $query = $connect->prepare("DELETE FROM `transactions` WHERE id = ? ");
        if($query->execute([$transaction_id])){
            echo "Transaction removed";
        }
    }