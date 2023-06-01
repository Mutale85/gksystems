<?php
	include 'includes/db.php';
	setcookie("bulwark", "", time() - 36000, "/");
    setcookie("bulwarkAccount", "", time() - 36000, "/");
	unset($_SESSION['email']);
	unset($_SESSION['user_id']);
	unset($_SESSION['parent_id']);
	unset($_SESSION['lastname']);
	unset($_SESSION['lastname']);
    unset($_SESSION['user_type']);
	session_unset();
	session_destroy();
	header("location:./");
?>