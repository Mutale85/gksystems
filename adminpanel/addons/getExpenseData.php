<?php
require "../../includes/db.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $expense = $_POST['expense'];
    echo getTransactions($expense);
}
?>
