<?php
	require("functions.php");
	session_start();
	if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
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
		Dear <?php echo $_SESSION['name'];?> Looks like you want to change the password for your account.Make some strong password and try to remember it!!!
	</b></marquee></span><br><br>
		<center><h4><b><u>Change Admin Password</b></u></h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="update_password.php" method="post">
					<div class="form-group">
						<label for="password">Enter Password:</label>
						<input type="password" class="form-control" name="old_password">
					</div>
					<div class="form-group">
						<label for="New Password">Enter New Password:</label>
						<input type="password" name="new_password" class="form-control">
					</div>
					<button type="submit" name="update" class="btn btn-primary">Update Password</button>
				</form>
			</div>
			
			<div class="col-md-4"></div>
		</div>
</body>
</html>
