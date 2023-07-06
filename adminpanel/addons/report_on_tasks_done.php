<?php 
    include("../../includes/db.php");
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        $work_status = filter_input(INPUT_POST, 'work_status', FILTER_SANITIZE_SPECIAL_CHARS);
        $remarks = filter_input(INPUT_POST, 'remarks', FILTER_SANITIZE_SPECIAL_CHARS);
        $date_worked = filter_input(INPUT_POST, 'date_worked', FILTER_SANITIZE_SPECIAL_CHARS);
        $date_worked = date("Y-m-d", strtotime($date_worked));
        $task_id = preg_replace("#[^0-9]#", "", $_POST['task_id']);
        $reference = filter_input(INPUT_POST, 'reference', FILTER_SANITIZE_SPECIAL_CHARS);
        if($work_status == 'Works completed') {
            $status = 'closed';
            // Send an sms to company owner and tenant
        }else{
            $status = 'open';
        }

        $update  = $connect->prepare("UPDATE task_assignments SET status = ?,  work_status = ?, remarks = ?, date_worked = ? WHERE reference = ? ");
        if($update->execute([$status, $work_status, $remarks, $date_worked, $reference])){
            $response = ['success' => true];
            header('Content-Type: application/json');
            echo json_encode($response);
            $update  = $connect->prepare("UPDATE problem_reports SET status = ? WHERE reference = ? ");
            $update->execute([$status, $reference]);

        }else{
            $response = ['success' => false];
            header('Content-Type: application/json');
            echo json_encode($response);
        }

    }
?>