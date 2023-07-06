<?php 
    include("../../../includes/db.php");
    extract($_POST);
    $leaseStartDate = date("Y-m-d", strtotime($leaseStartDate));
    $leaseEndDate = date("Y-m-d", strtotime($leaseEndDate));
    if(empty($tenant_id)){
        $pw =  '123456';
        $password = password_hash($pw, PASSWORD_DEFAULT);
        $pw =  base64_encode('123456');
        
        $sql = $connect->prepare("INSERT INTO `tenants`(`firstname`, `lastname`, `email`, `phonenumber`, `house_number`, `num_people`, `parent_id`,  `password`, `pw`, `leaseStartDate`, `leaseEndDate`, `currency`, `rentAmount`, `paymentFrequency`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute([$first_name, $last_name, $email, $phonenumber, $house_number, $num_people,  $_SESSION['parent_id'], $password, $pw, $leaseStartDate, $leaseEndDate, $currency, $rentAmount, $paymentFrequency]);
    
        echo "Tenant's Data inserted successfully into the database!";

    }else{
        $update = $connect->prepare("UPDATE `tenants` SET `firstname` = ?, `lastname` = ?, `email` = ?, `phonenumber` = ?, `house_number` = ?, `num_people` = ?, `leaseStartDate` = ?, `leaseEndDate` = ?, `currency` = ?, `rentAmount` = ?, `paymentFrequency` = ? WHERE tenant_id = ? ");
        $update->execute([$first_name, $last_name, $email, $phonenumber, $house_number, $num_people, $leaseStartDate, $leaseEndDate, $currency, $rentAmount, $paymentFrequency, $tenant_id]);
    
        echo "Tenant's Data updated successfully!";
    }

    $connect = null;
?>