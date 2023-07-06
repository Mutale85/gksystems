<?php 
    include("../../../includes/db.php");
    if(isset($_POST['tenant_id'])){
        extract($_POST);

        echo getTenantsDetails($connect, $tenant_id);
        
    }

    $connect = null;
?>