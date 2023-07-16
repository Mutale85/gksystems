<?php
require "../../includes/db.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $income = $_SESSION['phonenumber'];
    echo getVehicleIncome($income);

}
?>
