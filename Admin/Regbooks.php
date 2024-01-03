<?php

	session_start();
	if(!isset($_SESSION['email']))
{
	die("Access denied");
}
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$category = "";
	$book_no = "";
	$price = "";
	$query = "select books.book_name,books.book_no,book_price,books.quantity,authors.author_name from books left join authors on books.author_id = authors.author_id";
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Reg Books</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <style>
		body {
			background: rgb(238,174,202);
background: -moz-radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
background: -webkit-radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eeaeca",endColorstr="#94bbe9",GradientType=1);
		
		}
	</style>
</head>
<body>
<?php include('navbar.php')?>
	<span><marquee style="background-color:violet">
	<b>		Dear,<?php echo $_SESSION['name'];?> Here have a look all of the Registered Books With Details and download the list if needed!!!</b>
</marquee></span><br><br>
<center><h4><b><u>Registered Books</u></b></h4><br></center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" width="900px" style="text-align: center">
						<tr style="background-color:#F5DF4D">
							<th>Name</th>
							<th>Author</th>
							<th>Price</th>
							<th>Number</th>
							<th>Quantity</th>
							
						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
						<tr>
							<td><?php echo $row['book_name'];?></td>
							<td><?php echo $row['author_name'];?></td>
							<td><?php echo $row['book_price'];?></td>
							<td><?php echo $row['book_no'];?></td>
							<td><?php echo $row['quantity'];?></td>
						</tr>

					<?php
						}
					?>	
				</table>
				<br>
				<center><a class="btn btn-warning" href="../downloads/down_avail_books.php" target="_blank">Download list</a></center>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>
