<?php
	session_start();
	if(!isset($_SESSION['email']))
{
	die("Access denied");
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$query = "delete from users where id = '$_GET[id]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("User Deleted successfully...");
	window.location.href = "Regusers.php";
</script>