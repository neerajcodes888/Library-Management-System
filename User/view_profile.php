<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('error.html'));
}
#fetch data from database
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$id = "";
$name = "";
$course = "";
$department = "";
$email = "";
$mobile = "";
$query = "select * from users where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
	$id = $row['id'];
	$course = $row['course'];
	$department = $row['department'];
	$name = $row['name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$address = $row['address'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
		body{
			background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
			background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
		background-attachment: fixed;
		background-repeat: no-repeat;
		}
	</style
</head>

<body  style="background-color:grey">
<?php include('navbar.php') ?>
	<span>
		<marquee style="background-color:violet">
			<b> Hey ,
				<?php echo $_SESSION['name']; ?> Here is Your profile details. Have a Look!!!
			</b>
		</marquee>
	</span><br><br>
	<center>
		<h4><b><u>Student Profile Detail</u></b></h4><br>
	</center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form>
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="id">Roll Number:</label>
					<input type="text" class="form-control" value="<?php echo $id; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="course">Course Enrolled:</label>
					<input type="text" class="form-control" value="<?php echo $course; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="department">Department:</label>
					<input type="text" class="form-control" value="<?php echo $department; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" value="<?php echo $email; ?>" class="form-control" disabled>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile:</label>
					<input type="text" value="<?php echo $mobile; ?>" class="form-control" disabled>
				</div>
				<div class="form-group">
					<label for="email">Address:</label>
					<input type="text" value="<?php echo $address; ?>" class="form-control" disabled>
				</div>
<center>				<a class="btn btn-warning" href="downloads/down_user_id.php" target="_blank">Download E-ID Card</a></center>
<br><br>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>
