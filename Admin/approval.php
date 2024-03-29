<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$book_name = "";
$author = "";
$book_no = "";
$student_id = "";
$role="";
$query = "select * from admins where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
	$name = $row['name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$role = $row['role'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Not Returned Books</title>
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
	<span>
		<marquee style="background-color:violet"><b>
			Dear <?php echo $_SESSION['name'];?> ,Please Take action whether you want to accept or reject the book request and download the list if needed!!!
		</b>
		</marquee>
	</span><br><br>
	<center>
		<h4>Requested Book's Detail</h4><br>
	</center>
	<center>
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
						<th>Action</th>
					</tr>
					<?php
					$query = "select * from request_books";
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
							<button class="btn"><a style="color:green"
										href="accept.php?rn=<?php echo $row['request_no']; ?>">Accept</a></button>
								
								<button class="btn"><a style="color:red"
										href="reject.php?rn=<?php echo $row['request_no']; ?>">Delete</a></button>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
		<center>		<br>
				<a class="btn btn-warning" href="../downloads/down_admin_requests.php" target="_blank">Download list</a></center>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>


