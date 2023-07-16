<?php 
    include("../../includes/db.php");

    if(isset($_POST['loan_id'])){
        $loan_id = preg_replace("#[^0-9]#", "", $_POST['loan_id']) ;
        $query = $connect->prepare("SELECT * FROM `loans` WHERE id = ? ");
        $query->execute([$loan_id]);
        $result = $query->fetch();
        if($result){
            echo json_encode($result);
        }

    }