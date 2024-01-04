<?php
session_start();
$msg='';
if(isset($_SESSION['email_alert']))
{
    $msg="Email already Exists";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	#main_content{
		padding: 50px;
		background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
background-attachment: fixed;
  background-repeat: no-repeat;
    font-family: 'Vibur', cursive;
    font-family: 'Abel', sans-serif;

	}
	#side_bar{
		background-color: lightgrey;
		padding: 50px;
		width: 500px;
		height: 1100px;
	}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user_login.php"> User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php"></span>Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin/index.php">Admin Login</a>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="about_us.php">About Us</a>
				</li>
			</ul>
		</div>
	</nav>
	<marquee style="background-color:lightblue"><b>
		Welcome to User Registration Form , Please fill all the fields correctly.Visit left sidebar instructions for more!.
	</b></marquee>
	</span>
	<div class="row">
		<div class="col-md-4" id="side_bar">
			<br><br>
			<h5>Library Timing</h5>
			<ul>
				<li>Opening: 8:00 AM</li>
				<li>Closing: 8:00 PM</li>
				<li>(Sunday Off)</li>
			</ul>
			<h5>Facilities We provide ?</h5>
			<ul>
				<li>Full furniture</li>
				<li>Free Wi-fi</li>
				<li>News Papers</li>
				<li>Discussion Room</li>
				<li>RO Water</li>
				<li>Peacefull Environment</li>
			</ul>
			<h5>How to Fill Form ?</h5>
			<ul>
				<li>Write Official Name.</li>
				<li>Roll Number : College Provided</li>
				<li>Fill Course & Department</li>
				<li>Enter Correct Email & Phone Number</li>
				<li>Fill strong password</li>
				<li>Take preview of the Data</li>
			</ul>
			<h5>Some Constraints</h5>
			<ul>
				<li>All Fileds are required</li>
				<li>For strong password,use below
					<ol>
						A-Z , a-z , 0-9 
					</ol>
					<ol>
						Special Characters like @,#
					</ol>
					<ol>
						Add digit as well
					</ol>
				</li>
				<li>Recheck Mobile Number</li>
				<li>Recheck Email Address</li>
				<li>Verify Roll Number</li>
				<li>Match the information again</li>
			</ul>
		</div>
		<div class="col-md-8" id="main_content">
		
			<center>
			    <h3><b> <span class="alert-danger"><?php echo $msg ?></span></b></h3>
			<img src="images/registration_logo.png" alt="user login" width="120" height="100">
				<h3><b><u>User Registration Form</u></b></h3>
			</center>
			<form action="register.php" method="post">
				<div class="form-group">
					<label for="name">Full Name:</label>
					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="id">Roll Number:</label>
					<input type="text" name="id" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="course">Course:</label>
					<input type="text" name="course" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="department">Department:</label>
					<input type="text" name="department" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input type="email" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile:</label>
					<input type="text" name="mobile" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea name="address" class="form-control" required></textarea> 
				</div>
				<center><button type="submit" class="btn btn-primary">Register</button>	
				<button type="reset" name="reset" class="btn btn-primary">Reset</button> </center>
			</form>
		</div>
		<?php unset($_SESSION['email_alert']); ?>
	</div>
	<?php include('footer.php') ?>
</body>

</html>