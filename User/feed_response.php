<?php
session_start();
if(!isset($_SESSION['email']))
{
	die(include('error.html'));
}

	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "select * from feedback where roll='$_SESSION[id]';";
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
<body>
<?php include('navbar.php') ?>
	<span><marquee style="background-color:violet"><b>
	This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM
	</b>
	</marquee></span><br><br>
		<center><h4><b><u>Feedback</u></b></h4><br></center>
	      <center>
		<div class="row">
		<div class="col-md-1"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" width="1220px"  style="text-align: center">
						<tr style="background-color:#F5DF4D">
                        <th>Feedback No</th>
							
							<th>feedback date</th>
							<th>Feedback Realted to</th>
                            <th>Your Feedback</th>
                            <th>Feedback Response</th>
						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
                            <td><?php echo $row['id'];?></td>
							<td><?php echo $row['feed_date'];?></td>
							<td><?php echo $row['category'];?></td>
                            <td><?php echo $row['message'];?></td>
                            <td><?php echo $row['response'];?></td>
                            
						</tr>

					<?php
						}
					?>	
				</table>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>


