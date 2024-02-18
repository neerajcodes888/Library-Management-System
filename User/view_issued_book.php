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
	$Issued_date="";
	$return_date="";
	$query = "select book_name,book_author,book_no,date_format(issue_date,'%d/%m /%Y') as Issued_date,date_format(adddate(issue_date,30),'%d/%m/%Y') as return_date 
	from issued_books where student_id = '$_SESSION[id]'";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issued Books</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <style>
		body{
			background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
			background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
		background-attachment: fixed;
		background-repeat: no-repeat;
		}
	</style
</head>
<body style="background-color:grey">
<?php include('navbar.php') ?>
	<span><marquee style="background-color:#009B77">
	<b>
	<?php echo $_SESSION['name'];?>  Here is the list Of issued books from the library. Have a look ,  keep Learning and download all if you need!!!
</b>
</marquee>
</span>
	<br><br>
		<center><h4><b><u>Issued Book's Details</u></b></h4><br></center>
		<div class="row">
		  <center>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" width="900px" style="text-align: center">
						<tr style="background-color:#F5DF4D">
							<th>Name</th>
							<th>Author</th>
							<th>Number</th>
							<th>issue Date</th>
							<th>Last Date of Return</th>
						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
							<td><?php echo $row['book_name'];?></td>
							<td><?php echo $row['book_author'];?></td>
							<td><?php echo $row['book_no'];?></td>
							<td><?php echo $row['Issued_date'];?></td>
							<td><?php echo $row['return_date'];?></td>
						</tr>

					<?php
						}
					?>	
				</table>
				<br>
				<center>
				<a class="btn btn-warning" href="downloads/down_issue.php" target="_blank">Download list</a>
				</center>	
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>
