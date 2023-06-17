<?php 
    include("../../includes/db.php");

    if(isset($_POST['firstname'])){
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $phonenumber = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_SPECIAL_CHARS);
        $user_role = filter_input(INPUT_POST, 'user_role', FILTER_SANITIZE_SPECIAL_CHARS);
        $parent_id = $_SESSION['parent_id'];
        $pw =  '123456';
        $password = password_hash($pw, PASSWORD_DEFAULT);
        $pw =  base64_encode('123456');

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

        $sql = $connect->prepare("INSERT INTO `team_members`(`username`, `firstname`, `lastname`, `email`, `password`, `pass_w`, `phonenumber`, `parent_id`, `user_role`, `department`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
        $sql->execute([$firstname, $firstname, $lastname, $email, $password, $pw, $phonenumber, $parent_id, $user_role, $department]);
        echo ' Employee with named '.$firstname. ' '. $lastname. '  added successfully';
        
    }
?>