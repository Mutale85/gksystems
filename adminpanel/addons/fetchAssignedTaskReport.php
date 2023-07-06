<?php 
    include("../../includes/db.php");
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        $reference = $_POST['reference'];
        $query  = $connect->prepare("SELECT * FROM task_assignments  WHERE reference = ? AND status = 'closed' ");
        $query->execute([$reference]);
        $result = $query->fetch();
        extract($result);
    ?>

        <div class="card">
            <div class="card-header">
                Report Details
            </div>
            <div class="card-body">
                <!-- <h5 class="card-title"><?php echo $work_status?></h5> -->
                <p class="card-text"><?php echo $remarks?></p>
                <ul class="list-group">
                    <li class="list-group-item">Report ID: <?php echo $reference?></li>
                    <li class="list-group-item">Report by: <?php echo getReporterByPhone($employeeId)?></li>
                    <li class="list-group-item">Date: <?php echo date("F d, Y", strtotime($date_worked))?></li>
                    <li class="list-group-item">Status: <?php echo $work_status?></li>
                </ul>
            </div>
        </div>
    <?php
    }