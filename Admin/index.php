<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LMS | Login</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="./bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="./bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
</head>
<style type="text/css">
	#main_content {
		padding: 50px;
		background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
		background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
		background-attachment: fixed;
		background-repeat: no-repeat;
		font-family: 'Vibur', cursive;
		font-family: 'Abel', sans-serif;
		opacity: .95;

	}

	#side_bar {
		background-color: lightgrey;
		padding: 50px;
		width: 300px;
		height: 450px;
	}
</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<a class="navbar-brand" href="../index.php">Library Management System (LMS)</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../user_login.php"> User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../signup.php"></span>Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../about_us.php">About us</a>
				</li>
			</ul>
		</div>
	</nav>
	<marquee style="background-color:lightblue"><b>
Hello , Admins!! Here is the login for your Portal.Please Enter correct Credentials to log in. Incase of any error report ASAP!!!
		</b></marquee>
	</span>
	<div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>Library Timing</h5>
			<ul>
				<li>Opening: 8:00 AM</li>
				<li>Closing: 8:00 PM</li>
				<li>(Sunday Off)</li>
			</ul>
			<h5>What We provide ?</h5>
			<ul>
				<li>Full furniture</li>
				<li>Free Wi-fi</li>
				<li>News Papers</li>
				<li>Discussion Room</li>
				<li>RO Water</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>
		<div class="col-md-8" id="main_content">
			<center>
			<img src="../images/admin.png" alt="user login" width="120" height="100">
				<h3><b><u>Admin Login Form</u></b></h3>
			</center>
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<center><button type="submit" name="login" class="btn btn-primary">Login</button></center>
			</form>
			<?php
			if (isset($_POST['login'])) {
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"lms");
				$query = "select * from admins where email = '$_POST[email]'";
				$query_run = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if ($row['email'] == $_POST['email']) {
						if ($row['password'] == $_POST['password']) {
							$_SESSION['name'] = $row['name'];
							$_SESSION['email'] = $row['email'];
							header("Location: admin_dashboard.php");
						} else {
							?>
							<br><br>
							<center><span class="alert-danger">Wrong Password !!</span></center>
							<?php
						}
					}
				}
			}
			?>
		</div>
	</div>
	<?php include('../footer.php') ?>
</body>

</html>
