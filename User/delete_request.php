<html>

<head>
	<title>LMS</title>
	<meta charset="utf-8" name=<?php
	?>"viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function preventBack() { window.history.forward() };
		setTimeout("preventBack()", 0);
		window.onunload = function () { null; }
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	</link>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['email']))
{
	header("location:user_login.php");
}
				$connection = mysqli_connect("localhost", "id21139225_root", "myDatabase@2023");
				$db = mysqli_select_db($connection, "id21139225_lms");
	$query = "delete from request_books where request_no = $_GET[rn]";
	$query_run = mysqli_query($connection,$query);
?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	</link>
<script type="text/javascript">
						swal({
          title: 'Success!',
          text: 'Book Request Deleted!',
          type: 'warning'
        }).then(function() {
            window.location.href = "show_requests.php";
        });
</script>
</body>
</html>
