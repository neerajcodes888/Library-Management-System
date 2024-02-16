<?php

	require("functions.php");
	session_start();
	if(!isset($_SESSION['email']))
{
die(include('../user/error.html'));
}
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
	$name = "";
	$email = "";
	$mobile = "";
	$role="";
	$query = "select * from admins where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$role=$row['role'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <style>
body{
	background: rgb(238,174,202);
background: -moz-radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
background: -webkit-radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eeaeca",endColorstr="#94bbe9",GradientType=1);
}
		</style>
</head>
<body>
<?php include('navbar.php')?>
	<span><marquee style="background-color:violet"><b>
	Dear,<?php echo $_SESSION['name'];?> You can change your mobile only for Security Concerns!!!</b>
</marquee></span><br><br>
		<center><b><u><h4>Admin Profile Update</b></u></h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="update.php" method="post">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" name="name" value="<?php echo $name;?>" disabled>
					</div>
					<div class="form-group">
						<label for="role">Role Assigned:</label>
						<input type="text" class="form-control" name="role" value="<?php echo $role;?>" disabled>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" class="form-control" value="<?php echo $email;?>" disabled>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile:</label>
						<input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>">
					</div>
					<button type="submit" name="update" class="btn btn-primary">Update</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
