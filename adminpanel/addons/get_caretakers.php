<?php 
    include("../../includes/db.php");
    if(isset($_POST['caretakers'])){
        $department = $_POST['caretakers'];
        $query = $connect->prepare("SELECT * FROM `team_members` WHERE department = ? ");
        $query->execute([$department]);
        echo '<option value="">Select caretaker</option>';
        foreach($query->fetchAll() as $row){
            extract($row);
            echo '<option value="'.$phonenumber.'">'.$firstname.' '.$lastname.'</option>';
        }
    }
?>