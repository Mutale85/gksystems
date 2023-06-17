<?php 
    include("../../../includes/db.php");
    if(isset($_POST['tenant_id'])){
        extract($_POST);
        
        $query = $connect->prepare("SELECT * FROM `tenants` WHERE tenant_id = ? ");
        $query->execute([$tenant_id]);
        $row = $query->fetch();
        if($row){
            echo json_encode($row);
        }
        
    }

    $connect = null;
?>