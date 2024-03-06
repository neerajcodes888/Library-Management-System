<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:user_login.php");
}

	#fetch data from database

	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");

	$book_name = "";
	$author = "";
	$book_no = "";
	$Issued_date="";
	$return_date="";
	$query = "select book_name,book_author,book_no,date_format(issue_date,'%d/%m /%Y') as Issued_date,date_format(adddate(issue_date,30),'%d/%m/%Y') as return_date 
	from issued_books where student_id = '$_SESSION[id]'";
?>




<!DOCTYPE html>
<html>
<head>
	<title>Issued Books</title>
		<link rel = "icon" href = 
"data:image/jpeg;base64,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" 
        type = "image/x-icon">
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">

	  <style>
		body{
			background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
			background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
		background-attachment: fixed;
		background-repeat: no-repeat;
		}

        /* CSS for button animations */
.btn-animated {
    position: relative;
    overflow: hidden;
    color: #fff;
    border: none;
    border-radius: 5px;
    background-color: #ffc107;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-animated::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 300%;
    height: 300%;
    background-color: rgba(255, 255, 255, 0.1);
    transition: all 0.5s ease;
    border-radius: 50%;
    transform: translate(-50%, -50%);
    z-index: 0;
}

.btn-animated:hover::before {
    width: 0;
    height: 0;
}

.btn-animated span {
    position: relative;
    z-index: 1;
}

.btn-animated:hover {
    background-color: #ff9800;
    color: #fff;
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






/* CSS for card design */
.floating-card {
    position: relative;
    transition: transform 0.3s ease-in-out;
    border-radius: 10px;
    padding: 20px;
    background-color: #f8f9fa; /* Light background color */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
}

.floating-card:hover {
    transform: scale(1.05); /* Zoom-out effect on hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); /* Increase shadow on hover */
}

.card-title {
    font-family: 'Roboto', sans-serif; /* Use Roboto font for card title */
    font-size: 24px; /* Larger font size for title */
    font-weight: 700; /* Bold font weight for title */
    color: #333; /* Dark text color */
    margin-bottom: 10px; /* Add spacing below title */
}

.card-subtitle {
    font-family: 'Roboto', sans-serif; /* Use Roboto font for subtitle */
    font-size: 18px; /* Medium font size for subtitle */
    font-weight: 400; /* Normal font weight for subtitle */
    color: #666; /* Slightly lighter text color */
    margin-bottom: 10px; /* Add spacing below subtitle */
}

.card-text {
    font-family: 'Roboto', sans-serif; /* Use Roboto font for card text */
    font-size: 16px; /* Regular font size for card text */
    color: #666; /* Light text color */
    margin-bottom: 5px; /* Add spacing below each paragraph */
}

/* CSS for floating textures */
.floating-texture {
    display: none; /* Remove floating textures */
}





	</style>

    
</head>
<body style="background-color:grey">
<?php include('navbar.php') ?>
	<span class="marquee-text">
    <marquee scrollamount="5">
	<b>
	<?php echo $_SESSION['name'];?>  Welcome to the library! Here is the list of books currently issued under your name. Take a moment to explore the titles and feel free to download any that interest you. Keep learning and expanding your horizons!
</b>
</marquee>
</span>
	<br><br>



<div class="container">
    <center><h4><b><u>Issued Book's Details</u></b></h4></center>
    <div class="row justify-content-center">
        <?php
            $query_run = mysqli_query($connection, $query);
            $book_number = 1; // Initialize book number
            while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body floating-card">
                    <h5 class="card-title">Book <?php echo $book_number++; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['book_name']; ?></h6>
                    <p class="card-text">Author: <?php echo $row['book_author']; ?></p>
                    <p class="card-text">Number: <?php echo $row['book_no']; ?></p>
                    <p class="card-text">
                        <b>Issue Date: </b><?php echo $row['Issued_date']; ?><br>
                        <b>Last Return Date: </b><?php echo $row['return_date']; ?>
                    </p>
                    <!-- Floating textures for decoration -->
                    <div class="floating-texture"></div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <!-- "Download list" button -->
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <a class="btn btn-warning btn-sm btn-animated" href="downloads/down_issue.php" target="_blank">Download list</a>
        </div>
    </div>
</div>








			
</body>
</html>
