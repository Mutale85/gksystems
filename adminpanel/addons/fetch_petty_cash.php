<?php
    include '../../includes/db.php';
    if(isset($_POST['petty_cash'])){
        echo pettyCash();
    }

?>
