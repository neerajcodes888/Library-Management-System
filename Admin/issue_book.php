<?php
session_start();
if (!isset($_SESSION['email'])) {
	die(include('../user/error.html'));
}
#fetch data from database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$book_name = "";
$author_name = "";
$category = "";
$book_no = "";
$price = "";
$quantity="";
$query = "select books.book_id,books.book_name,books.book_no,book_price,books.quantity,authors.author_name from books left join authors on books.author_id = authors.author_id";
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
			background-image: linear-gradient(-120deg, #d4fc79 0%, #96e6a1 100%);
			background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
			background-attachment: fixed;
			background-repeat: no-repeat;
		}
	</style>
	<?php include('navbar.php') ?>
	<span>
		<marquee style="background-color:lightblue">
			<b>
				<?php echo $_SESSION['name']; ?> Here is the list Of available books in the library. Have a look and take
				which one you need and download!!!
			</b>
		</marquee>
	</span>
	<br><br>
	<div class="container">
		<form method="post">
			<input type="text" placeholder="Search Books/Authors" name=search>
			<button class="btn btn-dark btn-sm" name="submit">Search</button>
		</form>
	</div>
	<center>
		<h4><u><b>Registered Book's Details</b></u></h4><br>
	</center>
<center>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
				<table class="table-bordered" width="900px" style="text-align: center">
					<tr>
						<th>Book ID</th>
						<th>Name</th>
						<th>Author</th>
						<th>Price</th>
						<th>Number</th>
						<th>Quantity</th>
					</tr>

					<?php
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						?>
						<tr>
							<td>
								<?php echo $row['book_id']; ?>
							</td>
							<td>
								<?php echo $row['book_name']; ?>
							</td>
							<td>
								<?php echo $row['author_name']; ?>
							</td>
							<td>
								<?php echo $row['book_price']; ?>
							</td>
							<td>
								<?php echo $row['book_no']; ?>
							</td>
							<td>
								<?php echo $row['quantity']; ?>
							</td>
						</tr>

						<?php
					}
					?>
				</table>
				<br>
				<center>

					<a class="btn btn-warning" href="downloads/down_avail.php" target="_blank">Download list</a>
				</center>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
	<br>
	<center>
		<h4><u><b>Searched Book's Details</b></u></h4><br>
	</center>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
				<table class="table-bordered" width="900px" style="text-align: center">
					<tr>
						<th>Book ID</th>
						<th>Name</th>
						<th>Author</th>
						<th>Price</th>
						<th>Number</th>
						<th>Quantity</th>
						<th>Action</th>
					</tr>

					<?php
					if (isset($_POST['submit'])) {
						$sql = "SELECT * from books,authors where books.author_id=authors.author_id and (books.book_name like '%$_POST[search]%' or authors.author_name like '%$_POST[search]%')";
						$query_run = mysqli_query($connection, $sql);
					}
					while ($row = mysqli_fetch_assoc($query_run)) {
						?>
						<tr>
							<td>
								<?php echo $row['book_id']; ?>
							</td>
							<td>
								<?php echo $row['book_name']; ?>
							</td>
							<td>
								<?php echo $row['author_name']; ?>
							</td>
							<td>
								<?php echo $row['book_price']; ?>
							</td>
							<td>
								<?php echo $row['book_no']; ?>
							</td>
							<td>
								<?php echo $row['quantity']; ?>
							</td>
							<td><button class="btn" name=""><a href="issue.php?bn=<?php echo $row['book_no']; ?>"" style="
										color:green">Issue</a></button></td>
						</tr>

						<?php
					}
					?>
				</table>
				</body>
</html>
