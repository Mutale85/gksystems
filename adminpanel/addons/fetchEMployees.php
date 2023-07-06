<?php 
    include("../../includes/db.php");

    if(isset($_POST['fetchEMployees'])){
        $user_role = 'employee';
        echo fetchEmployees($connect, $user_role);
    }