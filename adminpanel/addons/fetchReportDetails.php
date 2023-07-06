<?php 
    include("../../includes/db.php");

    if(isset($_POST['reference'])){
        $reference = $_POST['reference'];
        fetchReportsDetails($connect, $reference);
    }

    if(isset($_POST['reference_report_id'])){
        echo fetchTransportReportsDetails($_POST['reference_report_id']);
    }