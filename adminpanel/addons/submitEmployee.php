<?php 
    include("../../includes/db.php");

    if(isset($_POST['firstname'])){
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_SPECIAL_CHARS);
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_SPECIAL_CHARS);
        $job_title = filter_input(INPUT_POST, 'job_title', FILTER_SANITIZE_SPECIAL_CHARS);
        $user_role = filter_input(INPUT_POST, 'user_role', FILTER_SANITIZE_SPECIAL_CHARS);
        $employee_contract = filter_input(INPUT_POST, 'employee_contract', FILTER_SANITIZE_SPECIAL_CHARS);
        $parent_id = $_SESSION['parent_id'];
        $pw =  '123456';
        $password = password_hash($pw, PASSWORD_DEFAULT);
        $pw =  base64_encode('123456');
        $employe_id = $_POST['employee_id'];
        
        if(empty($employe_id)){
            $query = $connect->prepare("SELECT * FROM `team_members` WHERE firstname = ? AND lastname = ? ");
            $query->execute([$firstname, $lastname]);
            if($query->rowCount() > 0){
                echo ' Employee named '.$firstname. ' '. $lastname. ' is already added';
                exit();
            }

            $query = $connect->prepare("SELECT * FROM `team_members` WHERE phonenumber = ? ");
            $query->execute([$phonenumber]);
            if($query->rowCount() > 0){
                echo 'Employee with phone number '.$phonenumber. ' is already added';
                exit();
            }

            if($user_role == 'superAdmin'){
                $department = 'all';
            }else{
                $department = $department;
            }
        
            $sql = $connect->prepare("INSERT INTO `team_members`(`username`, `firstname`, `lastname`, `email`, `password`, `pass_w`, `phonenumber`, `parent_id`, `user_role`, `department`, `job_title`, `employee_contract`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
            $sql->execute([$firstname, $firstname, $lastname, $email, $password, $pw, $phonenumber, $parent_id, $user_role, $department, $job_title, $employee_contract]);
            echo ' Employee named '.$firstname. ' '. $lastname. '  added successfully';
        }else{
            $update = $connect->prepare(" UPDATE `team_members` SET `username` = ?, `firstname` = ?, `lastname` = ?, `email` = ?,  `phonenumber` = ?,  `user_role` = ?, `department` = ?, job_title = ?, `employee_contract` = ? WHERE id = ? ");
            $update->execute([$firstname, $firstname, $lastname, $email, $phonenumber, $user_role, $department, $job_title, $employee_contract, $employe_id ]);
            echo ' Employees data updated successfully';
        }
    }
?>