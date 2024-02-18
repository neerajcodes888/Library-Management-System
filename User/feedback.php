<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('error.html'));
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Book</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function alertMsg() {
			alert("Request For book Sent Successfully...");
			window.location.href = "user_dashboard.php";
		}
	</script>
		  <style>
		body{
			background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
			background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
		background-attachment: fixed;
		background-repeat: no-repeat;
		}
	</style
</head>

<body>
<?php include('navbar.php') ?>
	<span><marquee style="background-color:lightblue">
	<b>
	<?php echo $_SESSION['name'];?>  Here You can give feedback to your administrator and ask related Complaints and Suggestions!!!
</b>
</marquee>
</span><br><br>
	<center>
		<h4><b><u>Feedback Form</u></b></h4><br>
	</center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
            <div class="form-group">
					<label for="name">Student ID:</label>
							<select class="form-control" name="name">
						
							<option>
							<?php echo $_SESSION['name'];?>
							</option>
							<?php
						
						?>
					</select>
					
				</div disabled>
				<div class="form-group">
					<label for="roll">Student ID:</label>
							<select class="form-control" name="roll">
						
							<option>
							<?php echo $_SESSION['id'];?>
							</option>
							<?php
						
						?>
					</select>
					
				</div>
                <div class="form-group">
					<label for="category">Feedback Related:</label>
							<select class="form-control" name="category">
						
							<option>
							Complaint
							</option>
                            <option>
							Suggestions
							</option>
                            <option>
							Others
							</option>
					</select>
					
				</div>
				<div>
                        <div class="form-group">
                            <textarea name="feedback" class="form-control" placeholder="Your Feedback *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
				<button type="submit" name="Feedback" class="btn btn-primary">Submit Feedback</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>
<?php
if (isset($_POST['Feedback'])) {
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "insert into feedback values('','$_POST[name]','$_POST[roll]',current_date,'$_POST[category]','$_POST[feedback]','N/A')";
	$query_run = mysqli_query($connection, $query);
	#header("Location:user_dashboard.php");
	?>
			<script type="text/javascript">
		alert("Feedback Sent Successfully");
	</script>
	<?php
}
?>
