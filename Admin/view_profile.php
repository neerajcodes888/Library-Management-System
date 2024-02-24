<?php
	require("functions.php");
	session_start();
	if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}

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
	Dear,<?php echo $_SESSION['name'];?> Here,have a look of Your Dashing Profile and Download E-ID Card!!!</b>
	</marquee></span><br><br>
		<center><h4><b><u>Admin Profile Detail</b></u></h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form>
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" value="<?php echo $name;?>" disabled>
					</div>
					<div class="form-group">
						<label for="role">Assigned Role:</label>
						<input type="text" class="form-control" value="<?php echo $role;?>" disabled>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" value="<?php echo $email;?>" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile:</label>
						<input type="text" value="<?php echo $mobile;?>" class="form-control" disabled>
					</div>
					<center><a class="btn btn-warning" href="../downloads/down_admin_id.php" target="_blank">Download list</a></center>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

			
