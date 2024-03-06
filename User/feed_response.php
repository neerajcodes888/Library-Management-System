<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:user_login.php");
}

	#fetch data from database
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");
	$query = "select * from feedback where roll='$_SESSION[id]';";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Responses</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
            background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
            background-attachment: fixed;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            padding: 20px;
        }

        .card-feedback {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            width: calc(33.33% - 20px); /* 33.33% width for three cards in a row with gap */
            max-width: 300px; /* Maximum width for each card */
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            text-align: center;
        }

        .card-feedback:hover {
            transform: scale(1.05);
        }

        .btn-download-list {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #333;
            font-weight: bold;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s, transform 0.3s;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
        }

        .btn-download-list:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #333;
            transform: scale(1.1);
            animation: shake 0.5s;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-3px); }
            100% { transform: translateX(0); }
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
<body>
<?php include('navbar.php') ?>
<span class="marquee-text">
    <marquee scrollamount="6">
        <b><?php echo $_SESSION['name'];?>  Here You can give feedback to your administrator and ask related Complaints and Suggestions!!!</b>
    </marquee>
</span>
<br><br>
<center>
    <h4><b><u>Feedback Response</u></b></h4><br>
</center>
<div class="card-container">
    <?php
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
    <div class="card-feedback">
        <h3 style="font-size: 22px; font-weight: bold;">Feedback No: <?php echo $row['id']; ?></h3>
        <hr>
        <p style="font-size: 18px;">Feedback Date: <?php echo $row['feed_date']; ?></p>
        <hr>
        <p style="font-size: 18px;">Feedback Related To: <?php echo $row['category']; ?></p>
        <hr>
        <p style="font-size: 18px;">Your Feedback: <?php echo $row['message']; ?></p>
        <hr>
        <p style="font-size: 18px;">Feedback Response: <?php echo $row['response']; ?></p>
        <hr>
    </div>
    <?php
    }
    ?>
</div>
<br>
<center><a class="btn-download-list" href="downloads/down_dues.php" target="_blank">Download list</a></center>
<br><br>
</body>
</html>


