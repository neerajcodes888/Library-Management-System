<?php
session_start();
// if(!isset($_SESSION['email']))
// {
// 	die("Access denied");
// }
require('functions.php');
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Book</title>
		<link rel = "icon" href = 
"data:image/jpeg;base64,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" 
        type = "image/x-icon">
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function alertMsg() {
			alert("Book added successfully...");
			window.location.href = "admin_dashboard.php";
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	</link>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	</link>
	<style>
		body {
			background: rgb(238, 174, 202);
			background: -moz-radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(195, 177, 219, 1) 38%, rgba(148, 187, 233, 1) 100%);
			background: -webkit-radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(195, 177, 219, 1) 38%, rgba(148, 187, 233, 1) 100%);
			background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(195, 177, 219, 1) 38%, rgba(148, 187, 233, 1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eeaeca", endColorstr="#94bbe9", GradientType=1);
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="user_dashboard.php">Library Management System (LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome:
						<?php echo $_SESSION['name']; ?>
					</strong></span></font>
			<!-- <font style="color: white"><span><strong>Email:
						<?php echo $_SESSION['email']; ?>
					</strong></font> -->
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<span>
		<marquee style="background-color:violet">
			Please Press on request book to request to the admin!!!.
		</marquee>
	</span><br><br>
	<center>
		<h4><b><u>Confirm Request Book</u></b></h4><br>
	</center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">

				<div class="form-group">
					<label for="book_name">Book Name:</label>
					<select class="form-control" name="book_name">
						<option>-Select Book-</option>
						<?php

						$query = "select book_name from books where book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_name']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>


				<div class="form-group">
					<label for="book_no">Author:</label>
					<select class="form-control" name="author_name">
						<option>-Select Author-</option>
						<?php

						$query = "select author_name from authors,books where books.author_id=authors.author_id and book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['author_name']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="book Price">Price:</label>
					<select class="form-control" name="">
						<option>-Select Book Number-</option>
						<?php

						$query = "select book_price from books where book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_price']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="book_no">Book Number:</label>
					<select class="form-control" name="book_no">
						<option>-Select Book Number-</option>
						<?php

						$query = "select book_no from books where book_no=$_GET[bn]";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['book_no']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="student_id">Student ID:</label>
					<select class="form-control" name="student_id">
						<option>-Select Roll Number-</option>
						<?php
						$query = "select id from users where id='$_SESSION[id]'";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							?>
							<option>
								<?php echo $row['id']; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<button type="submit" name="issue_book" class="btn btn-primary">Request Book</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>
<?php
if (isset($_POST['issue_book']))
{
$author=$_POST['author_name'];
	if (get_user_issue_book_count() >= 5) {
		?>
		<script type="text/javascript">
			alert("Book Limit Exceeded");
			window.location.href = "view_issued_book.php";
		</script>
	<?php
}
else{
	$query = "select quantity from books where book_no=$_GET[bn]";
	$query_run = mysqli_query($connection, $query);
	if($row['quantity']=0)
{
	?>
			<script type="text/javascript">
					swal({
          title: 'OOPS!',
          text: 'Book  Out Of Stock!',
          type: 'warning'
        }).then(function() {
            window.location.href = "show_requests.php";
        });
	</script>
	<?php

}
else{

    $auth=$_POST['author_name'];
    $bn=$_POST['book_no'];
    $bkn=$_POST['book_name'];

function sendmail($auth,$bkn,$bn)
        {   
        require('email/Exception.php');
        require('email/SMTP.php');
        require('email/PHPMailer.php');
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aryaak323@gmail.com';                     //SMTP username
            $mail->Password   = 'nnxjouocvevvwcop';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('aryaak323@gmail.com', 'LMS Book Request');
            // $mail->addAddress();
            // $mail->addAddress('neerajak164@gmail.com');        //Add a recipient
            //Content
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $roll = $_SESSION['id'];
            $currentTime = date("Y-m-d H:i:s");
            // $author=$auth;
            $mail->isHTML(true);          
            
            
            
             $bodyRecipient1 = "Dear $name,   Your book request has been palced. here are some details of your requested book 
$auth
<ul>
<li><b>Book Number</b> : $bn</li>
<li> <b>Book Name</b> : $bkn</li>
<li><b>Author Name</b> : $auth</li>
<li><b>Date Of Order</b> : $currentTime</li>
<li> Your book request will be approved soon.</li>
<li>If you encounter any issues or need further assistance, feel free to contact our support team.</li>
</ul>

<h4>We hope you enjoy reading your requested book!<h4>

<h2>Best regards<h2>
<h2>Team LMS<h2>";
        
        // Set HTML email body for recipient 2
        $bodyRecipient2 = "Dear Sir,   One Book  book request has been placed. here are some details of that requested book and student
$auth
<ul>
<li><b>Book Number</b> : $bn</li>
<li> <b>Book Name</b> : $bkn</li>
<li><b>Author Name</b> : $auth</li>
<li><b>Student Name</b> : $name</li>
<li><b>Student Roll Number</b> : $id</li>
<li><b>Student Email</b> : $email</li>
<li><b>Date Of Order</b> : $currentTime</li>
</ul>
<li>If you encounter any issues or need further assistance, feel free to contact our support team.</li>


<h4>We hope you enjoy reading your requested book!</h4>

<h2>Best regards</h2>
<h2>Team LMS</h2>";
            
            
        $mail->addAddress($_SESSION['email'], 'User');
        $mail->Subject = 'Book Request'; // Set subject for recipient 1
        $mail->Body = $bodyRecipient1;
        $mail->send();
        
        $mail->clearAddresses(); // Clear previous recipient

        $mail->addAddress('neerajak164@gmail.com', 'Admin');
        $mail->Subject = 'Book Request'; // Set subject for recipient 2
        $mail->Body = $bodyRecipient2;
        $mail->send();
   return true;
        } catch (Exception $e) {
           // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           return false;
        }
        }
   
	$query = "insert into request_books (request_no,student_id,book_no,book_name,book_author,dated,status) values(NULL,'$_SESSION[id]','$_POST[book_no]','$_POST[book_name]','$_POST[author_name]',current_date,'Not Accepted')";
	$query_run = mysqli_query($connection, $query);
    // $val = array($_POST);
 
	if($query_run && sendmail($auth,$bkn,$bn)) {      
	?>
	<script type="text/javascript">
				swal({
          title: 'Success!',
          text: 'Book Request Sent!',
          type: 'success'
        }).then(function() {
            window.location.href = "show_requests.php";
        });
</script>
<?php
}else{
    	?>
	<script type="text/javascript">
alert("Error Ocuured");
</script>
<?php
}
}
}
} 
?>
</html>
