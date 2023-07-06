<?php 
    require "../../includes/db.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $landlord_name = $_POST['landlord_name'];
        $tenant_name = $_POST['tenant_name'];
        $tenant_phone = $_POST['tenant_phone'];
        $flat_number = $_POST['flat_number'];
        $lease_term = $_POST['lease_term'];
        $currency = $_POST['currency'];
        $rent_amount = $_POST['rent_amount'];
        $security_deposit = $_POST['security_deposit'];
        $agreement = $_POST['agreement_date'];
        $date = DateTime::createFromFormat("l, d F, Y", $agreement);
        $agreement_date = $date->format("Y-m-d");

        $currentYear = date('Y');
        // Check if the tenant has signed an agreement in the current year
        $query = "SELECT * FROM `lease_agreements` WHERE tenant_name = ? AND YEAR(`agreement_date`) = ? ";
        $stmt = $connect->prepare($query);
        $stmt->execute([$tenant_name, $currentYear]);
        $agreementCount = $stmt->rowCount();

        if ($agreementCount > 0) {
            $response =  ['success' => true, 'message' => 'The tenant has already signed an agreement in the current year'];
            echo json_encode($response);
            exit;
        } else {
            $sql = "INSERT INTO lease_agreements (landlord_name, tenant_name, tenant_phone, flat_number, lease_term, currency, rent_amount, security_deposit, agreement_date)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->execute([$landlord_name, $tenant_name, $tenant_phone, $flat_number, $lease_term, $currency, $rent_amount, $security_deposit, $agreement_date]);
            // Return success response
            $response = ['success' => true, 'message' => 'Form submitted successfully'];
            echo json_encode($response);
        }
        
    }
?>