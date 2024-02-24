<?php
require("functions.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
		body {
			background: rgb(63, 94, 251);
			background: -moz-radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
			background: -webkit-radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
			background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#3f5efb", endColorstr="#fc466b", GradientType=1);
			background-attachment: fixed;
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>
<?php include('navbar.php')?>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:salmon">
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
				<li class="nav-item">
					<a class="nav-link" href="view_feedback.php">Feedback</a>
				</li>
			</ul>
		</div>
	</nav>
	<span>
		<marquee style="background-color:violet"><b>
 Hello Mr. <?php echo $_SESSION['name'];?> ,Please do perform all the operations and integrity with your Prestigious Role Assistant Librarian.Have a  look of Your Dashboard and keep going!!!
			</b></marquee>
	</span><br><br>
	<div class="row">
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered User</div>
				<div class="card-body">
					<p class="card-text">No. total Users:
						<?php echo get_user_count(); ?>
					</p>
					<a class="btn btn-danger" href="Regusers.php" >View Registered Users</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Total Book</div>
				<div class="card-body">
					<p class="card-text">No of books available:
						<?php echo get_book_count(); ?>
					</p>
					<a class="btn btn-success" href="Regbooks.php" >View All Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Categories</div>
				<div class="card-body">
					<p class="card-text">No of Book's Categories:
						<?php echo get_category_count(); ?>
					</p>
					<a class="btn btn-warning" href="Regcat.php" >View Categories</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">No. of Authors</div>
				<div class="card-body">
					<p class="card-text">No of Authors:
						<?php echo get_author_count(); ?>
					</p>
					<a class="btn btn-primary" href="Regauthor.php" >View Authors</a>
				</div>
			</div>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Issued</div>
				<div class="card-body">
					<p class="card-text">No of book issued:
						<?php echo get_issue_book_count(); ?>
					</p>
					<a class="btn btn-success" href="view_issued_book.php" >View Issued Books</a>
				</div>
			</div>
		</div><br><br>
		<!-- <div class="col-md-3"></div>
		<div class="col-md-3"></div> -->
		<!-- <div class="row"> -->
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Not Returned Books</div>
				<div class="card-body">
					<p class="card-text">No of books not Returned:
						<?php echo not_return_book_count(); ?>
					</p>
					<a class="btn btn-warning" href="view_not_return_book.php">View not returned
						books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Books Requests </div>
				<div class="card-body">
					<p class="card-text">No of Requested Books:
						<?php echo get_request_count(); ?>
					</p>
					<a class="btn btn-danger" href="approval.php">View requested books</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
