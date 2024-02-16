<?php
	session_start();
	if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$query = "delete from authors where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Author Deleted successfully...");
	window.location.href = "manage_author.php";
</script>
