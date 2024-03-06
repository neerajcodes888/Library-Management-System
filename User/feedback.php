<?php
session_start();
if(!isset($_SESSION['email']))
{
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
            background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
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
		<?php echo $_SESSION['name'];?>  Here You can give feedback to your administrator and ask related Complaints and Suggestions!!!
		</marquee>
	</span>
	<br><br>
	<center><h4><b><u>Feedback Form</u></b></h4></center>
<div class="container">
   
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Student ID:</label>
                        <select class="form-control" name="name" disabled>
                            <option><?php echo $_SESSION['name'];?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roll">Student ID:</label>
                        <select class="form-control" name="roll" disabled>
                            <option><?php echo $_SESSION['id'];?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Feedback Related:</label>
                        <select class="form-control" name="category">
                            <option>Complaint</option>
                            <option>Suggestions</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="feedback" class="form-control" placeholder="Your Feedback *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                    <button type="submit" name="Feedback" class="btn btn-primary btn-block">Submit Feedback</button>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<br><br>
</body>
</html>






<?php
if (isset($_POST['Feedback'])) {
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");
	$query = "insert into feedback values(NULL,'$_POST[name]','$_POST[roll]',current_date,'$_POST[category]','$_POST[feedback]','N/A')";
	$query_run = mysqli_query($connection, $query);
	if(	$query_run){
	?>
			<script type="text/javascript">
			swal({
          title: 'Success!',
          text: 'Feedback Sent Successfully!',
          type: 'success'
        }).then(function() {
            window.location.href = "feed_response.php";
        });

	</script>
	<?php
}
}
?>
