<?php 
    include("../../includes/db.php");

    if(isset($_POST['transaction_id'])){
        $transaction_id = preg_replace("#[^0-9]#", "", $_POST['transaction_id']) ;
        $query = $connect->prepare("SELECT * FROM `transactions` WHERE id = ? ");
        $query->execute([$transaction_id]);
        $result = $query->fetch();
        if($result){
            echo json_encode($result);
        }
    }