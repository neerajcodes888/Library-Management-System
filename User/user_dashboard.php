<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");

require("functions.php");
if(!isset($_SESSION['email'])) {
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
		body {
			background-image: linear-gradient(-225deg, red 0%, yellow 100%);
			background-image: linear-gradient(to top, violet 0%, blue 100%);
			background-attachment: fixed;
			background-repeat: no-repeat;
		}
		.card {
			border-radius: 20px;
			box-shadow: 0px 10px 30px 0px rgba(0,0,0,0.1);
			transition: transform 0.3s ease-in-out;
			margin-bottom: 30px;
			background-color: #f9f9f9;
			border: none;
            margin-top: 20px; /* Added margin-top */
		}
		.card:hover {
			transform: translateY(-5px);
		}
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            padding: 15px;
            border-bottom: none;
        }
        .btn {
            border-radius: 25px;
            transition: transform 0.3s ease-in-out;
        }
        .btn:hover {
            transform: scale(1.1);
        }
		.marquee-text {
			background-color: #FFA500;
			color: #000000;
			padding: 15px;
			font-size: 18px;
			font-weight: bold;
			text-align: center;
			margin-bottom: 20px;
			border-radius: 20px;
			width: 100%;
			height: 30px;
			line-height: 30px;
			overflow: hidden;
			animation: marquee 20s linear infinite;
		}
		@keyframes marquee {
			0% { transform: translateX(100%); }
			100% { transform: translateX(-100%); }
		}
	</style>
</head>
<body style="background-color:grey">
<?php include('navbar.php') ?>
	<span class="marquee-text">
		<marquee scrollamount="6">
			Welcome <?php echo $_SESSION['name'];?> to Your Dashboard. Explore and manage your activities like viewing issued books, requesting new books, checking available books, and clearing dues/fines.
		</marquee>
	</span>
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card bg-light">
					<div class="card-header">Book Issued</div>
					<div class="card-body">
						<p class="card-text text-center">No of book issued: <?php echo get_user_issue_book_count();?></p>
						<a class="btn btn-success btn-block animated rubberBand" href="view_issued_book.php">View Issued Books</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card bg-light">
					<div class="card-header">Request Books</div>
					<div class="card-body">
						<p class="card-text text-center">Total No. Of Available Books: <?php echo get_book_count();?></p>
						<a class="btn btn-secondary btn-block animated rubberBand" href="avail_books.php">View all Books</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card bg-light">
					<div class="card-header">Requested Books</div>
					<div class="card-body">
						<p class="card-text text-center">No. of requests Made Till Now:<?php echo get_request_count();?></p>
						<a class="btn btn-warning btn-block animated rubberBand" href="show_requests.php">See Requests</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card bg-light">
					<div class="card-header">Pay dues Fine</div>
					<div class="card-body">
						<p class="card-text text-center">No. of Dues Fine:<?php echo get_dues_count();?></p>
						<a class="btn btn-danger btn-block animated rubberBand" href="show_dues.php">Clear Your Dues</a>
					</div>
				</div>
			</div>
			<!-- Add more cards here if needed -->
		</div>
	</div>
</body>
</html>
