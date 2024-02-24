<?php
session_start();
	unset($_SESSION['email']);


header("Location:user_login.php");
?>
