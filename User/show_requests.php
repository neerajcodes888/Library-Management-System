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
$query = "select * from request_books where student_id='$_SESSION[id]'";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	    <link rel="icon" href="https://e7.pngegg.com/pngimages/606/201/png-clipart-mississauga-library-system-school-library-public-library-online-public-access-catalog-library-miscellaneous-trademark-thumbnail.png" type="image/x
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
		body {
			background: rgb(34,193,195);
background: -moz-radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
background: -webkit-radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
background: radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#22c1c3",endColorstr="#6b2dfd",GradientType=1);
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

		.card {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			transition: transform 0.3s;
		}
		.card:hover {
			transform: translateY(-5px);
			box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
		}
		.card-body {
			padding: 20px;
		}
		.card-title {
			font-size: 1.5rem;
			font-weight: bold;
			color: #333;
		}
		.card-text {
			font-size: 1rem;
			color: #555;
		}
		.btn-danger {
			background-color: #dc3545;
			border-color: #dc3545;
		}
		.btn-danger:hover {
			background-color: #c82333;
			border-color: #bd2130;
		}
		.btn-download {
	background-color: #ffc107;
	border-color: #ffc107;
	color: #333;
	font-weight: bold;
	transition: background-color 0.3s, border-color 0.3s, color 0.3s, transform 0.3s;
}

.btn-download:hover {
	background-color: #e0a800;
	border-color: #d39e00;
	color: #333;
	transform: scale(1.1);
}

	</style>
</head>
<body style="background-color:grey">
<?php include('navbar.php') ?>

	<span class="marquee-text">
		<marquee scrollamount="6">
		<b>
		<?php echo $_SESSION['name'];?>  Here is the list Of Your Requested books in the library. Have a look and take which one you need and download!!!
			</b>
			</marquee>
	</span>
	<br>
	<br>
	<center>
		<h4><b><u>Requested Book's Detail</u></b></h4><br>
	</center>


	<div class="container">
		<div class="row">
			<?php
			$query_run = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($query_run)) {
				?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100" style="cursor: pointer; transition: transform 0.3s;">
						<div class="card-body" style="text-align: center;">
							<h5 class="card-title">Book Name: <?php echo $row['book_name']; ?></h5>
							<p class="card-text">Author: <?php echo $row['book_author']; ?></p>
							<p class="card-text">Book Number: <?php echo $row['book_no']; ?></p>
							<p class="card-text">Request Number: <?php echo $row['request_no']; ?></p>
							<p class="card-text">Status: <?php echo $row['status']; ?></p>
							<div class="mt-4">
								<a class="btn btn-danger animate__animated animate__bounce" href="delete_request.php?rn=<?php echo $row['request_no']; ?>">Remove Request</a>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<div class="row justify-content-center mt-4">
		<div class="col-lg-4">
    <a class="btn btn-warning btn-block btn-download" href="downloads/down_requests.php" target="_blank">Download list</a>
</div>

		</div>
	</div>
	<script>
		// Add zoom effect on card hover
		document.querySelectorAll('.card').forEach(card => {
			card.addEventListener('mouseenter', () => {
				card.style.transform = 'scale(1.05)';
			});

			card.addEventListener('mouseleave', () => {
				card.style.transform = 'scale(1)';
			});
		});
	</script>
	<br>
<br>

</body>
</html>
