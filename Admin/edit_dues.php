<?php
	session_start();
	if(!isset($_SESSION['email']))
{
	die(include('../user/error.html'));
}
	
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
    $s_no="";
	$book_name = "";
	$book_no = "";
	$author_name = "";
	$student_id = "";
	$issue_date = "";
	$query = "select * from issued_books where s_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
        $s_no=$row['s_no'];
		$book_name = $row['book_name'];
		$book_no = $row['book_no'];
		$author_name = $row['book_author'];
		$student_id = $row['student_id'];
		$issue_date = $row['issue_date'];
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
</head>
<body>
<?php include('navbar.php')?><br>
	<span><marquee>Dear,<?php echo $_SESSION['name'];?> Please take any of the action to edit the dues or remove now!!!</marquee></span><br><br>
		<center><h4>Edit Book</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
                <div class="form-group">
						<label for="mobile">Book Receipt ID:</label>
						<input type="text" name="s_no" value="<?php echo $s_no?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Student Roll  Number:</label>
						<input type="text name="student_id" value="<?php echo $student_id;?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Renew:</label>
						<input type="date" name="issue_date" value="<?php echo $issue_date;?>" class="form-control"  required>
					</div>
					<button type="submit" name="update" class="btn btn-primary">Update entry</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['update'])){
		include("db_connect.php");
		$query = "update issued_books set issue_date = $_POST[issue_date],s_no='' where s_no = $_GET[s_no]";
		$query_run = mysqli_query($connection,$query);
		?>
			<script type="text/javascript">
		alert("Dues edited Successfully");
	</script>
	<?php
		// header("location:view_not_return_book.php");
	}
		
?>
