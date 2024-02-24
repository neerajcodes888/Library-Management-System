<?php
	session_start();
	if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}
	
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$book_no = "";
	$student_name = "";
	$query = "select issued_books.book_name,issued_books.book_author,issued_books.book_no,users.name ,users.id from issued_books left join users on issued_books.student_id = users.id";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issued Books</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
body{
	background: rgb(238,174,202);
background: -moz-radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
background: -webkit-radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(195,177,219,1) 38%, rgba(148,187,233,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eeaeca",endColorstr="#94bbe9",GradientType=1);
}
		</style
</head>
<body>
<?php include('navbar.php')?>
	<span><marquee style="background-color:violet"><b>
	Dear,<?php echo $_SESSION['name'];?> Here,have a look of all issued Books issued to the Students and download the list if needed!!!
	</b>
	</marquee></span><br><br>
		<center><h4><b><u>Issued Book's Detail</u></b></h4><br></center>
		<center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" width="900px" style="text-align: center">
						<tr style="background-color:#F5DF4D">
							<th>Book Name</th>
							<th>Book Author</th>
							<th>Book Number</th>
							<th>Student Name</th>
							<th>Student Roll</th>
						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
							<td><?php echo $row['book_name'];?></td>
							<td><?php echo $row['book_author'];?></td>
							<td><?php echo $row['book_no'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['id'];?></td>
						</tr>
					<?php
						}
					?>	
				</table>
				<br>
			<center>	<a class="btn btn-warning" href="../downloads/down_admin_issue.php" target="_blank">Download list</a></center>
				</form>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>
