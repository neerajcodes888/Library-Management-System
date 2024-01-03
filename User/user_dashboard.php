<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");

require("functions.php");
if(!isset($_SESSION['email']))
{
	header("location:user_login.php");
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
			background-image: linear-gradient(-225deg, red 0%, yellow 100%);
		background-image: linear-gradient(to top, violet 0%, blue 100%);
		background-attachment: fixed;
		background-repeat: no-repeat;
		}
	</style
</head>
<body  style="background-color:grey">
<?php include('navbar.php') ?>
	<span ><marquee style="background-color:#FFA500">
<b>
	Welcome <?php echo $_SESSION['name'];?> in Your Dashboard. Please have a look all information regarding your activities.
</b>
	</marquee></span>
	
	<div class="row">
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Issued</div>
				<div class="card-body">
					<p class="card-text">No of book issued: <?php echo get_user_issue_book_count();?></p>
					<a class="btn btn-success" href="view_issued_book.php">View Issued Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Request Books</div>
				<div class="card-body">
					<p class="card-text">Total No. Of Available Books: <?php echo get_book_count();?></p>
					<a class="btn btn-secondary" href="avail_books.php">View all Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Requested Books</div>
				<div class="card-body">
					<p class="card-text">No. of requests Made Till Now:<?php echo get_request_count();?></p>
					<a class="btn btn-warning" href="show_requests.php">See Requests</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Pay dues Fine</div>
				<div class="card-body">
					<p class="card-text">No. of Dues Fine:<?php echo get_dues_count();?></p>
					<a class="btn btn-danger" href="show_dues.php">Clear Your Dues</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>
</body>
</html>
