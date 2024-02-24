<?php
	session_start();
if(!isset($_SESSION['email']))
{
die(include('../user/error.html'));
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$query = "delete from issued_books where s_no=  $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Dues Removed successfully...");
	window.location.href = "view_not_return_book.php";
</script>
