<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <style type="text/css">
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            font-family: Arial, sans-serif;
        }

        #login-box {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            animation: fadeInRight 1s;
        }

        #sidebar-content {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            animation: fadeInLeft 1s;
            height: 100%;
        }

        @media (max-width: 768px) {
            #login-box,
            #sidebar-content {
                margin-bottom: 20px;
                height: auto;
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-control {
            border-radius: 20px;
            border: none;
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 20px;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 12px 30px;
            background-color: #6c63ff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #534bff;
        }

        .btn-warning {
            border-radius: 20px;
            padding: 12px 30px;
            background-color: #ffcc00;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e6b800;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-3" href="index.php" style="color:whitesmoke">Library Management System (LMS)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Register</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Marquee -->
    <marquee style="background-color: lightblue;">
        <b>Attention Users !!! Your login form is here, Please fill the correct credentials to log-in for your LMS
            activities.</b>
    </marquee>

    <div class="container">
        <div class="row">
            <!-- Sidebar content -->
            <div class="col-md-6">
                <div id="sidebar-content">
                    <h5>Library Timing</h5>
                    <ul>
                        <li>Opening: 8:00 AM</li>
                        <li>Closing: 8:00 PM</li>
                        <li>(Sunday Off)</li>
                    </ul>
                    <h5>What We Provide</h5>
                    <ul>
                        <li>Full furniture</li>
                        <li>Free Wi-fi</li>
                        <li>News Papers</li>
                        <li>Discussion Room</li>
                        <li>RO Water</li>
                        <li>Peaceful Environment</li>
                    </ul>
                </div>
            </div>

            <!-- Login box -->
            <div class="col-md-6">
                <div id="login-box">
                    <!-- Your login form content here -->
                    <h3><i class="fas fa-sign-in-alt"></i> User Login</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email ID" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Sign In</button>
                        <a class="btn btn-warning" href="signup.php">Sign Up</a>
                        <br><br>
                        <a href="forgot_password.php" style="color:red">Forgot Password?</a>
                    </form>


                    <?php
			if (isset($_POST['login'])) {

				$connection = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($connection, "lms");

				$query = "select * from users where email = '$_POST[email]'";
				$query_run = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($query_run)) {
	
						if ($row['email'] == $_POST['email']) {
							if ($row['password'] == $_POST['password'] && $row['Role']==0) {
								$_SESSION['name'] = $row['name'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['id'] = $row['id'];
								?>
			<script type="text/javascript">toastr.success('Login successful')
			window.location.href = "user_dashboard.php";
			</script>
								<?php
							}
							else{
								$_SESSION['name'] = $row['name'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['id'] = $row['id'];
								?>
			<script type="text/javascript">toastr.success('Login successful')
			window.location.href = "admin/admin_dashboard.php";
			</script>
								<?php
							}
						} 
						else if($row['email'] <> $_POST['email'] )
						{
						    ?>
								<script type="text/javascript">toastr.info('Email not registered')
		//	window.location.href = "user_login.php";
			</script>
						<?php
						
						}
					 else {
						?>
						<script type="text/javascript">toastr.error('Login Failed')
// 			window.location.href = "user_login.php";
			</script>
						<?php
					}
				
				}
			}
			?>
		</div>
	</div>

                    
                </div>
            </div>
            

        </div>
    </div>






	






    <!-- Footer -->
    <?php include('footer.php') ?>

    <!-- Optional: Include Bootstrap and other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-BJFZgVtXesqGyBA0xWzWnuYjnMO6I5gmvXJlba0//fPs9QxK8feGpNtW+4FtLv0AxJOM3lF6+b0/FMsIrkxfJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
