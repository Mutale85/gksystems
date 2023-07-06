<?php 
    include("../../includes/db.php");

    if(isset($_POST['employee_id'])){
        $employee_id = preg_replace("#[^0-9]#", "", $_POST['employee_id']) ;
        $query = $connect->prepare("SELECT * FROM `team_members` WHERE id = ? ");
        $query->execute([$employee_id]);
        $result = $query->fetch();
        if($result){
            echo json_encode($result);
        }

    }