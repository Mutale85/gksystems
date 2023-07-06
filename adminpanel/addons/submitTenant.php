<?php 
    include("../../includes/db.php");
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $leaseStartDate = $_POST['leaseStartDate'];
        $leaseEndDate = $_POST['leaseEndDate'];
        
        $date = DateTime::createFromFormat("l, d F, Y", $leaseStartDate);
        $StartDate = $date->format("Y-m-d");

        $date1 = DateTime::createFromFormat("l, d F, Y", $leaseEndDate);
        $EndDate = $date1->format("Y-m-d");
        extract($_POST);
        if(empty($tenant_id)){
            $pw =  '123456';
            $password = password_hash($pw, PASSWORD_DEFAULT);
            $pw =  base64_encode('123456');
            
            $sql = $connect->prepare("INSERT INTO `tenants`(`firstname`, `lastname`, `email`, `phonenumber`, `house_number`, `num_people`, `parent_id`,  `password`, `pw`, `leaseStartDate`, `leaseEndDate`, `currency`, `rentAmount`, `paymentFrequency`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute([$first_name, $last_name, $email, $phonenumber, $house_number, $num_people,  $_SESSION['parent_id'], $password, $pw, $StartDate, $EndDate, $currency, $rentAmount, $paymentFrequency]);
        
            echo "Tenant's Data inserted successfully into the database!";

        }else{
            $update = $connect->prepare("UPDATE `tenants` SET `firstname` = ?, `lastname` = ?, `email` = ?, `phonenumber` = ?, `house_number` = ?, `num_people` = ?, `leaseStartDate` = ?, `leaseEndDate` = ?, `currency` = ?, `rentAmount` = ?, `paymentFrequency` = ? WHERE tenant_id = ? ");
            $update->execute([$first_name, $last_name, $email, $phonenumber, $house_number, $num_people, $StartDate, $EndDate, $currency, $rentAmount, $paymentFrequency, $tenant_id]);
        
            echo "Tenant's Data updated successfully!";
        }
   }
    $connect = null;
?>