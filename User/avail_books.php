<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}

	#fetch data from database
				$connection = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($connection, "lms");
	$book_name = "";
	$author_name= "";
	$category = "";
	$book_no = "";
	$price = "";
	$query = "select books.book_id,books.book_name,books.book_no,book_price,books.quantity,authors.author_name from books left join authors on books.author_id = authors.author_id";
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Reg Books</title>
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
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-input {
            width: 300px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
        }
        .search-button {
            padding: 10px 20px;
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            outline: none;
        }
        .search-button:hover {
            background-color: #1e2124;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: transform 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: scale(1.1);
        }
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
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
    </style>
</head>
<body>
<?php include('navbar.php') ?>
<span class="marquee-text">
		<marquee scrollamount="6">
                <b><?php echo $_SESSION['name'];?>  Here is the list Of available books in the library. Have a look and take which one you need and download!!!</b>
            </marquee>
</span>
<br><br>
        <div class="search-container">
            <form method="post">
                <input type="text" placeholder="Search Books" name="search" class="search-input">
                <button class="btn btn-dark btn-sm search-button" name="submit">Search</button>
            </form>
        </div>
        <center><h4><u><b>Registered Book's Details</b></u></h4><br></center>
        <div class="row">
            <?php
                if(isset($_POST['submit'])) {
                    $sql = "SELECT * FROM books, authors WHERE books.author_id = authors.author_id AND (books.book_name LIKE '%$_POST[search]%' OR books.book_no LIKE '%$_POST[search]%' OR books.book_id LIKE '%$_POST[search]%')";
                    $query_run = mysqli_query($connection, $sql);
                } else {
                    $query_run = mysqli_query($connection, $query);
                }
                while ($row = mysqli_fetch_assoc($query_run)){
            ?>
            <div class="col-md-4">
                <div class="card" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['book_name'];?></h5>
                        <p class="card-text">Author: <?php echo $row['author_name'];?></p>
                        <p class="card-text">Price: <?php echo $row['book_price'];?></p>
                        <p class="card-text">Number: <?php echo $row['book_no'];?></p>
                        <p class="card-text">Quantity: <?php echo $row['quantity'];?></p>
                        <center><a href="request.php?bn=<?php echo $row['book_no']; ?>" class="btn btn-primary">Request</a></center>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>  
        </div>
        <br>
        <center>
			<a class="btn btn-warning" href="downloads/down_avail.php" target="_blank">Download list</a>
		</center>
		<br><br>
    </div>
</body>
</html>
