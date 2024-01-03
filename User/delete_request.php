<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:user_login.php");
}

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$query = "delete from request_books where request_no = $_GET[rn]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Request Deleted successfully...");
	window.location.href = "show_requests.php";
</script>