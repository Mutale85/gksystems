<?php 
    require '../../includes/db.php';
    if(isset($_POST['fetch_loans'])){
        echo fetchLoans();
        // echo 'Good';
    }
?>