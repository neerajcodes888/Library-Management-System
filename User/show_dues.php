<?php
session_start();
// if(!isset($_SESSION['email']))
// {
// 	die("Access denied");
// }
require('functions.php');
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
?>
