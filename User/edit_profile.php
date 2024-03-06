<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:user_login.php");
}

	#fetch data from database
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");
	$id="";
	$name = "";
	$course="";
	$department="";
	$email = "";
	$mobile = "";
	$query = "select * from users where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$id=$row['id'];
		$course=$row['course'];
		$department=$row['department'];
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$address = $row['address'];
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
            background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease-in-out;
            margin-top: 20px;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
        }

        button[type="submit"] {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .card {
                padding: 15px;
            }
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
		Hey , <?php echo $_SESSION['name'];?> If any information Would you like to change!! Just Change and Press Update Button.
        </marquee>
    </span>
	<br><br>
	<center><h4><b><u>Edit Profile</u></b></h4></center>

	<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                        </div>
                        <div class="form-group">
                            <label for="id">Roll Number:</label>
                            <input type="text" class="form-control" value="<?php echo $id;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="course">Course Enrolled:</label>
                            <input type="text" class="form-control" value="<?php echo $course;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <input type="text" class="form-control" value="<?php echo $department;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea rows="3" name="address" class="form-control"><?php echo $address;?></textarea>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
