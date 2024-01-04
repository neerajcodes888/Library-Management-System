<?php
session_start();
// if(!isset($_SESSION['email']))
// {
// 	die("Access denied");
// }
require('functions.php');
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Issue Book</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function alertMsg() {
			alert("Book added successfully...");
			window.location.href = "admin_dashboard.php";
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	</link>
	<style>
		body {
			background: rgb(238, 174, 202);
			background: -moz-radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(195, 177, 219, 1) 38%, rgba(148, 187, 233, 1) 100%);
			background: -webkit-radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(195, 177, 219, 1) 38%, rgba(148, 187, 233, 1) 100%);
			background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(195, 177, 219, 1) 38%, rgba(148, 187, 233, 1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eeaeca", endColorstr="#94bbe9", GradientType=1);
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="user_dashboard.php">Library Management System (LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome:
						<?php echo $_SESSION['name']; ?>
					</strong></span></font>
			<!-- <font style="color: white"><span><strong>Email:
						<?php echo $_SESSION['email']; ?>
					</strong></font> -->
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<span>
		<marquee style="background-color:violet">
			Please Press on request book to request to the admin!!!.
		</marquee>
	</span><br><br>
	<center>
		<h4><b><u>Confirm Request Book</u></b></h4><br>
	</center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">

				<div class="form-group">
					<label for="book_name">Book Name:</label>
					<select class="form-control" name="book_name">
						<option>-Select Book-</option>
						<?php

						$query = "select book_name from books where book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_name']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>


				<div class="form-group">
					<label for="book_no">Author:</label>
					<select class="form-control" name="author_name">
						<option>-Select Author-</option>
						<?php

						$query = "select author_name from authors,books where books.author_id=authors.author_id and book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['author_name']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="book Price">Price:</label>
					<select class="form-control" name="">
						<option>-Select Book Number-</option>
						<?php

						$query = "select book_price from books where book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_price']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="book_no">Book Number:</label>
					<select class="form-control" name="book_no">
						<option>-Select Book Number-</option>
						<?php

						$query = "select book_no from books where book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_no']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="student_id">Student ID:</label>
					<select class="form-control" name="student_id">
						<option>-Select Roll Number-</option>
						<?php
						$query = "select id from users where id='$_SESSION[id]'";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['id']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<button type="submit" name="issue_book" class="btn btn-primary">Request Book</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>
<?php
if (isset($_POST['issue_book']))
{
	if (get_user_issue_book_count() >= 5) {
		?>
		<script type="text/javascript">
			alert("Book Limit Exceeded");
			window.location.href = "view_issued_book.php";
		</script>
	<?php
}
else{
	$query = "select quantity from books where book_no=$_GET[bn]";
	$query_run = mysqli_query($connection, $query);
	if($row['quantity']=0)
{
	?>
			<script type="text/javascript">
		alert("Book out of Stock");
	</script>
	<?php

}
else{
	$query = "insert into request_books values('','$_SESSION[id]','$_POST[book_no]','$_POST[book_name]','$_POST[author_name]',current_date,'Not Accepted')";
	$query_run = mysqli_query($connection, $query);
	?>
	<script type="text/javascript">
alert("Book Request Sent Successfully");
</script>
<?php
}
}
} 
?>