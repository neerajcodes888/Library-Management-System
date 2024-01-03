<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$user_count = 0;
	$query = "select count(*) as user_count from users";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$user_count = $row['user_count'];
	}
?>