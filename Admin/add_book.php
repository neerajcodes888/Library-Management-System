<?php
require("functions.php");
session_start();
if(!isset($_SESSION['email']))
{
	die("Access denied");
}
#fetch data from database
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$name = "";
$email = "";
$mobile = "";
$query = "select * from admins where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
	$name = $row['name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Add New Book</title>
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
<?php include('navbar.php')?>
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
		<marquee style="background-color:violet"><b>
Dear <?php echo $_SESSION['name'];?> ,Please add the book by filling all required information!!!
			</marquee></b>
	</span><br><br>
	<center>
		<h4><b><u>Add a new Book</b></u></h4><br>
	</center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Book Name:</label>
					<input type="text" name="book_name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Author ID:</label>
					<input type="text" name="book_author" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Category ID:</label>
					<input type="text" name="book_category" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Book Number:</label>
					<input type="text" name="book_no" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Book Price:</label>
					<input type="text" name="book_price" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Book Quantity:</label>
					<input type="text" name="book_quantity" class="form-control" required>
				</div>
				<button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>

<?php
if (isset($_POST['add_book'])) {

	$query = "insert into books values('','$_POST[book_name]','$_POST[book_author]','$_POST[book_category]',$_POST[book_no],$_POST[book_price],$_POST[book_quantity])";
	$query_run = mysqli_query($connection, $query);
	// #header("location:add_book.php");
	?>
	<script type="text/javascript">
alert("Book added Successfully");
</script>
<?php
}
?>