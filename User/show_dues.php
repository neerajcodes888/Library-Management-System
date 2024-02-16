<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('error.html'));
}
#fetch data from database
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
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
	<title>Not Returned Books</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <style>
		body{
			background: rgb(34,193,195);
background: -moz-radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
background: -webkit-radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
background: radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(107,45,253,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#22c1c3",endColorstr="#6b2dfd",GradientType=1);
		}
	</style
</head>

<body>
<?php include('navbar.php') ?>
	<span>
		<marquee style="background-color:violet"><b>
		Hey ,
				<?php echo $_SESSION['name']; ?> Please Pay Your Dues if it is,Otherwise Fine will be Increasing*1 per day. Have a Look and download if you need!!!
				</b>
		</marquee>
	</span><br><br>
	<center>
		<h4><b><u>Not Returned Book's Detail</u></b></h4><br>
	</center>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
				<table class="table-bordered" width="900px" style="text-align: center">
					<tr style="background-color:#F5DF4D">
						<th>Book receipt ID</th>
						<th>Name</th>
						<th>Author</th>
						<th>Number</th>
						<th>Dues(in Rupees)</th>
						<th>Dues Status</th>
						<th>Action</th>
					</tr>
					<?php
					
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						?>
						<tr>
							<td>
								<?php echo $row['s_no']; ?>
							</td>
							<td>
								<?php echo $row['book_name']; ?>
							</td>
							<td>
								<?php echo $row['book_author']; ?>
							</td>
							<td>
								<?php echo $row['book_no']; ?>
							</td>
					
							<td>
								<?php echo $row['dues']; ?>
							</td>
							<td>
								<?php echo $row['dues_status']; ?>
							</td>
							<td >
								<button class="btn" name=""><b><a
										href="fine_pay.php?bn=<?php echo $row['book_no']; ?>" style="color:blue">
										Clear Your Dues
										</a></b></button>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<br>
				<center><a class="btn btn-warning" href="downloads/down_dues.php" target="_blank">Download list</a></center>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>

</html>
