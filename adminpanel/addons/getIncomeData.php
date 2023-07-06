<?php
require "../../includes/db.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $income = $_POST['income'];
    echo getTransactions($income);

}
?>
