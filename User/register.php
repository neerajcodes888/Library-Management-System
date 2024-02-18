


<html>

<head>
	<title>LMS</title>
	<meta charset="utf-8" name=<?php
	?>"viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
</head>

<body>

<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$sql="select * from users where email='$_POST[email]'";
$result=mysqli_query($connection,$sql);
$present=mysqli_num_rows($result);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email,$v_code)
{
	require('email/Exception.php');
require('email/SMTP.php');
require('email/PHPMailer.php');
$mail = new PHPMailer(true);
try {
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'aryaak323@gmail.com';                     //SMTP username
	$mail->Password   = 'nnxjouocvevvwcop';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	//Recipients
	$mail->setFrom('aryaak323@gmail.com', 'Email Verification');
	$mail->addAddress($email);     //Add a recipient
	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'LMS Email Verification';
	$mail->Body    = "Hey User ,  Your Verification link is here ,Please Click on 
	<b><a href='http://localhost/library/verify.php?email=$email&&v_code=$v_code'>Verify</a></b><br>";
	$mail->send();
   return true;
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   return false;
}
}
if($present>0)
{
    $_SESSION['email_alert']='1';
    header("location:signup.php"); 
}
else{
	
	$v_code=bin2hex(random_bytes(16));
	$query = "insert into users values('$_POST[id]','$_POST[name]','$_POST[course]','$_POST[department]','$_POST[email]','$_POST[password]','$v_code',0,'$_POST[mobile]','$_POST[address]')";
	
	if(mysqli_query($connection,$query)&& sendmail($_POST['email'],$v_code))
	{
?>
<script type="text/javascript">
	alert("Registration Successful , Please click on Verify email Sent to You!!!");
	window.location.href = "user_login.php";
</script>
<?php 
	}
	else{
		?>
		<script type="text/javascript">
	alert("Registration UnSuccessful!");
	window.location.href = "user_login.php";
</script>
<?php
	}
}
?>	
</body>
</html>
