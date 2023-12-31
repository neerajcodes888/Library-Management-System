<?php
	session_start();
	if(!isset($_SESSION['email']))
{
	die("Access denied");
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");	
$query = "delete from feedback where id = $_GET[in]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Feedback removed successfully...");
	window.location.href = "view_feedback.php";
</script> 
