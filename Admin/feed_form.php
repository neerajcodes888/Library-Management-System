<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}
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
Dear Dear,<?php echo $_SESSION['name'];?>  Please give response of the feedback given by the student.!!!
		</marquee>
	</span><br><br>
	<center>
		<h4>Feedback Response</h4><br>
	</center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
            <div class="form-group">
                            <textarea name="feedback" class="form-control" placeholder="Your Response*" style="width: 100%; height: 300px;"></textarea>
                        </div>
                
				<button type="submit" name="send_feed" class="btn btn-primary">Send</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>

<?php
if (isset($_POST['send_feed'])) {
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "update feedback set response='$_POST[feedback]' where id=$_GET[id_n]";
	$query_run = mysqli_query($connection, $query);
	?>
	<script type="text/javascript">
alert("Feedback Responded Successfully!!!");
</script>
<?php
}
?>
