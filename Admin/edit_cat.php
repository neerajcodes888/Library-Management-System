<?php

	session_start();
	if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$cat_id = "";
	$cat_name = "";
	$query = "select * from category where cat_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$cat_name = $row['cat_name'];
		$cat_id = $row['cat_id'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
<?php include('navbar.php')?>
	<span><marquee style="background-color:violet"><b>Dear,<?php echo $_SESSION['name'];?> Edit the Category Now!!!</b></marquee></span><br><br>
		<center><h4>Edit Book</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Category Name:</label>
						<input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" required>
					</div>
					<button type="submit" name="update_cat" class="btn btn-primary">Update Catogry</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['update_cat'])){
		include("db_connect.php");
		$query = "update category set cat_name = '$_POST[cat_name]' where cat_id = $_GET[cid]";
		$query_run = mysqli_query($connection,$query);
		?>
			<script type="text/javascript">
		alert("Book Category edited Successfully");
	</script>
	<?php
		header("location:manage_cat.php");
	}
?>
