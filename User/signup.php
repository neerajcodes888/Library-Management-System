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
	<title>User Registration</title>
		<link rel = "icon" href = 
"data:image/jpeg;base64,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" 
        type = "image/x-icon">
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
<?php include('navbar_home.php') ?>
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
				<li>Use Temporary Password For First Login
			<li>	If You Feel Password is not accepted,Contact US!!
				
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
					<label for="mobile">Mobile:</label>
					<input type="text" name="mobile" class="form-control" maxlength="10"  required>
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
