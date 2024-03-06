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
$book_name = "";
$author = "";
$book_no = "";
$student_name = "";
$query = "select issued_books.book_name,issued_books.book_author,issued_books.book_no,issued_books.s_no,issued_books.dues_status,datediff(current_date,adddate(issued_books.issue_date,30)) as dues from issued_books left join users on issued_books.student_id = users.id where current_date > adddate(issued_books.issue_date,30) and student_id = '$_SESSION[id]'";
$query_run = mysqli_query($connection, $query);
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
            background: rgb(34, 193, 195);
            background: -moz-radial-gradient(circle, rgba(34, 193, 195, 1) 0%, rgba(107, 45, 253, 1) 100%);
            background: -webkit-radial-gradient(circle, rgba(34, 193, 195, 1) 0%, rgba(107, 45, 253, 1) 100%);
            background: radial-gradient(circle, rgba(34, 193, 195, 1) 0%, rgba(107, 45, 253, 1) 100%);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#22c1c3", endColorstr="#6b2dfd", GradientType=1);
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
		.card-body {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card-body:hover {
            transform: scale(1.05);
        }

        .btn-clear-dues {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s, transform 0.3s;
        }

        .btn-clear-dues:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
            transform: scale(1.1);
        }

        .btn-download-list {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #333;
            font-weight: bold;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s, transform 0.3s;
        }

        .btn-download-list:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #333;
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
		<b>
         Hey, <?php echo $_SESSION['name']; ?> Please Pay Your Dues if it is,Otherwise Fine will be Increasing*1 per day. Have a Look and download if you need!!!
        </b>
		</marquee>
	</span>
	<br><br>
	<center>
        <h4><b><u>Not Returned Book's Detail</u></b></h4><br>
    </center>
	<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <div class="card-body">
                    <table class="table-bordered" width="100%" style="text-align: center">
                        <tr style="background-color:#F5DF4D">
                            <th>Book receipt ID</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Number</th>
                            <th>Dues(in Rupees)</th>
                            <th>Dues Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><?php echo $row['s_no']; ?></td>
                            <td><?php echo $row['book_name']; ?></td>
                            <td><?php echo $row['book_author']; ?></td>
                            <td><?php echo $row['book_no']; ?></td>
                            <td><?php echo $row['dues']; ?></td>
                            <td><?php echo $row['dues_status']; ?></td>
                            <td><button class="btn btn-clear-dues" name=""><b><a href="fine_pay.php?bn=<?php echo $row['book_no']; ?>" style="color: white;">Clear Your Dues</a></b></button></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>
            <br>
            <center><a class="btn btn-download-list" href="downloads/down_dues.php" target="_blank">Download list</a></center>
        </div>
        <div class="col-md-2"></div>
    </div>
	<br><br>
</body>
</html>
