<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script type="text/javascript">
		function preventBack(){window.history.forward()};
		setTimeout("preventBack()",0);
		window.onunload=function(){null;}
	</script>
	<style>
		.blink {
			animation: blinker 1.5s linear infinite;
			color: red;
			font-family: sans-serif;
		}

		@keyframes blinker {
			50% {
				opacity: 0;
			}
		}

		.carousel-inner>.item>img {
			width: 100%;
			height: 570px;
		}

		body {
			background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
			background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
			background-attachment: fixed;
			background-repeat: no-repeat;
		}
	</style>

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user_login.php"> User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php"></span>Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin/index.php">Admin Login</a>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="about_us.php">About Us</a>
				</li>
			</ul>
		</div>
	</nav>
	<span>
		<marquee style="background-color:lightblue"><b>
				Welcome to Library Management System. Here , You can explore all kind of stuffs availabe in the
				library.Please go through That. For more features, <a href="signup.php">Sign Up</a> right now!!!.
			</b>
		</marquee>
	</span>


	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/bg.jpg" height="500" width="1370" alt="image1">
				<div class="carousel-caption d-none d-md-block">
					<!-- <h5><b>Modern Library</b></h5>
					<p>1</p> -->
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/bg2.jpg" height="500" width="1370" alt="image2">
			</div>
			<div class="carousel-item">
				<img src="images/bg3.jpg" height="500" width="1370" alt="image3">
			</div>
			<div class="carousel-item">
				<img src="images/bg10.jpg" height="500" width="1370" alt="image4">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<br>

	<div class="card" style="background-color:lightblue">
		<div class="card-body">
			<marquee class="blink">
				<h3>
					<i class="bi bi-newspaper"></i>Welcome to Public Notification Panel...Please go through the latest
					updates...Thank You...
				</h3>
			</marquee>
		</div>
	</div>



	<div class="album py-5 bg-light">
		<div class="container">

			<div class="row">
				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top"
							data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
							src="images/bg4.jpg" data-holder-rendered="true">
						<div class="card-body">
							<p class="card-text">
								Chairs and study tables are provided each and every student to study and focus on their
								desired intention.
							</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top"
							data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="Thumbnail [100%x225]" src="images/bg6.jpg" data-holder-rendered="true"
							style="height: 225px; width: 100%; display: block;">
						<div class="card-body">
							<p class="card-text">
								Magzines are kept in such a way that You can easily pickup the magzines as per field or
								your choice.
							</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top"
							data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="Thumbnail [100%x225]" src="images/bg5.jpg" data-holder-rendered="true"
							style="height: 225px; width: 100%; display: block;">
						<div class="card-body">
							<p class="card-text">
								Issue Your book and take receipt.Verify receipt and return that book under 30 days.
								Late fine consists 1 rupees per day.
							</p>
							<div class="d-flex justify-content-between align-items-center">

							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top"
							data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="Thumbnail [100%x225]" src="images/bg7.jpg" data-holder-rendered="true"
							style="height: 225px; width: 100%; display: block;">
						<div class="card-body">
							<p class="card-text">
								BookShelf is structred as per department.
								Take the books as per your department or as per your need from BookShelf
							</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top"
							data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="Thumbnail [100%x225]" src="images/bg11.jpg" data-holder-rendered="true"
							style="height: 225px; width: 100%; display: block;">
						<div class="card-body">
							<p class="card-text">
								Water Purifier is there for you.Please close the tap after filling the water in  your own
								bottle.
							</p>
							<div class="d-flex justify-content-between align-items-center">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top"
							data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="Thumbnail [100%x225]" src="images/bg9.jpg">
						<div class="card-body">
							<p class="card-text">
								We provide desktops with internet connection to practice coding , watch lectures and do
								all other required things.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

	<?php include('footer.php') ?>
</body>

</html>
