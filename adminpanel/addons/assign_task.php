<?php 
    include("../../includes/db.php");
    include("../../includes/conf.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if(empty($_POST['employeeId'])){
            echo "Please select at-least one employee";
            exit;
        }else{
            $employeeIds = $_POST['employeeId'];
            $reference = $_POST['taskId'];
            $special_instructions = filter_input(INPUT_POST, 'special_instructions', FILTER_SANITIZE_SPECIAL_CHARS);
            foreach ($employeeIds as $employeeId) {
                // Insert assignment into the database
                $stmt = $connect->prepare('INSERT INTO task_assignments ( employeeId, reference, special_instructions) VALUES (?, ?, ?)');
                $stmt->execute([$employeeId, $reference, $special_instructions]);
                // we will send sms to employees
                $message = 'You have been assigned a task, please make sure its done and report ';
                echo SEND_SMSNOW($employeeId, $message, API, SENDER);
            }
            echo 'Task assigend to the selected employees';

            
            $message = 'Task has been has been assigned to employees ';
            $to = '+260970448181';
            echo SEND_SMSNOW($to, $message, API, SENDER);
            $to = '+260976330092';
            echo SEND_SMSNOW($to, $message, API, SENDER);
        }

    }