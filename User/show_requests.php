<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('error.html'));
}
#fetch data from database
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$query = "select * from request_books where student_id='$_SESSION[id]'";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Show Requests</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src=bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
		body {
			background: rgb(34,193,195);
background: -moz-radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
background: -webkit-radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
background: radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#22c1c3",endColorstr="#6b2dfd",GradientType=1);
		}
	</style>
</head>

<body>
	<?php include('navbar.php') ?>
	<span>
		<marquee style="background-color:violet"><b>
		<?php echo $_SESSION['name'];?>  Here is the list Of Your Requested books in the library. Have a look and take which one you need and download!!!
			</b>
		</marquee>
	</span><br><br>
	<center>
		<h4><b><u>Requested Book's Detail</u></b></h4><br>
	</center>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
				<table class="table-bordered" width="900px" style="text-align: center">
					<tr style="background-color:#F5DF4D">
						<th>Request Number</th>
						<th>Roll Number</th>
						<th>Book Number</th>
						<th>Book Name</th>
						<th>Author Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php

					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						?>
						<tr>
							<td>
								<?php echo $row['request_no']; ?>
							</td>
							<td>
								<?php echo $row['student_id']; ?>
							</td>
							<td>
								<?php echo $row['book_no']; ?>
							</td>
							<td>
								<?php echo $row['book_name']; ?>
							</td>
							<td>
								<?php echo $row['book_author']; ?>
							</td>
							<td>
								<?php echo $row['status']; ?>
							</td>
							<td>
								<button class="btn"><a style="color:red"
										href="delete_request.php?rn=<?php echo $row['request_no']; ?>">Remove
										Request</a></button>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<br>
				<center><a class="btn btn-warning" href="downloads/down_requests.php" target="_blank">Download list</a></center>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>

</html>
