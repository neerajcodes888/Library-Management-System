<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
require("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function alertMsg() {
			alert("Book added successfully...");
			window.location.href = "admin_dashboard.php";
		}
	</script>
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
				<a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome:
						<?php echo $_SESSION['name']; ?>
					</strong></span></font>
			<font style="color: white"><span><strong>Email:
						<?php echo $_SESSION['email']; ?>
					</strong></font>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="">View Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Edit Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: salmon">
		<div class="container-fluid">

			<ul class="nav navbar-nav navbar-center">
				<li class="nav-item">
					<a class="nav-link" href="admin_dashboard.php">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="add_book.php">Add New Book</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="manage_book.php">Manage Books</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="add_cat.php">Add New Category</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="add_author.php">Add New Author</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="manage_author.php">Manage Author</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="issue_book.php">Issue Book</a>
				</li>
			</ul>
		</div>
	</nav>
	<span>
		<marquee style="background-color:violet">
			Please Press on issue book to issue the book to that Registered student who has sent you request for the book!!!.
		</marquee>
	</span><br><br>
	<center>
		<h4>Issue Book</h4><br>
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
						include("db_connect.php");
						$query = "select book_name from request_books where request_no=$_GET[rn]";
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
					<label for="book_author">Author Name:</label>
					<select class="form-control" name="book_author">
						<option>-Select author-</option>
						<?php
						include("db_connect.php");
						$query = "select book_author from request_books where request_no=$_GET[rn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_author']; ?>
							</option>
							<?php
						}
						?>
					</select>
					<!--<input type="text" name="book_author" class="form-control" required> -->
				</div>
				<div class="form-group">
					<label for="book_no">Book Number:</label>
					<select class="form-control" name="book_no">
						<option>-Select Book Number-</option>
						<?php
					include("db_connect.php");
						$query = "select book_no  from request_books where request_no=$_GET[rn]";
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
						include("db_connect.php");
						$query = "select student_id from request_books where request_no=$_GET[rn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['student_id']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
				<button type="submit" name="issue_book" class="btn btn-primary">Issue Book</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
if (isset($_POST['issue_book'])) {
	
	if($row['quantity']=0)
	{
		?>
				<script type="text/javascript">
			alert("Book out of Stock");
		</script>
		<?php
	}
else{
	$query = "insert into issued_books values('',$_POST[book_no],'$_POST[book_name]','$_POST[book_author]','$_POST[student_id]',current_date,'N/A')";
    $query_run=mysqli_query($connection, $query);
	// $query1 = "update books set quantity=quantity-1 where book_no=$_POST[book_no]";
	// $query_run= mysqli_query($connection, $query1);
	// $query2 = "update request_books set status='Request Accepted' where request_no=$_GET[rn]";
	
  ?>
  <script type="text/javascript">
alert("Book Issued Successfully");
</script>
<?php
}
}
?>
