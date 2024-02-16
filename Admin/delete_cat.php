<?php
	session_start();
	if(!isset($_SESSION['email']))
{
die(include('../user/error.html'));
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$query = "delete from category where cat_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Category Deleted successfully...");
	window.location.href = "manage_cat.php";
</script>
