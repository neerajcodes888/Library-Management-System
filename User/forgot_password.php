<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
?>
<!DOCTYPE html>
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
<style type="text/css">
    #main_content {
        padding: 50px;
        background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
        background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;
    }

    #side_bar {
        background-color: lightgrey;
        padding: 50px;
        width: 300px;
        height: 500px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_login.php"> User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php"></span>Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
            </ul>
        </div>
    </nav>
    <marquee style="background-color:lightblue"><b>
            Attention Users !!! Your login form is here,Please fill the correct credentials to log-in for your LMS
            activities.
        </b>
    </marquee>
    </span>
    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening: 8:00 AM</li>
                <li>Closing: 8:00 PM</li>
                <li>(Sunday Off)</li>
            </ul>
            <h5>What We provide ?</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free Wi-fi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>Peacefull Environment</li>
            </ul>
        </div>
        <div class="col-md-8" id="main_content">
            <center>
                <img src="images/forgot_password.png" alt="user login" width="120" height="100">
                <h3><b><u>Forgot Password</u></b></h3>

            </center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <center><button type="submit" name="forgot_password" class="btn btn-danger">Submit</button>
                </center>
            </form>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>
<?php
if (isset($_POST['forgot_password'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $query = "update users set is_verified = '0'";
    $query_run = mysqli_query($connection, $query);
    $query = "select * from users where email = '$_POST[email]'";
    $query_run = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($query_run)==1) {
       
$pass1="";
        function sendmail($email,$v_code,$pass)
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
            $mail->setFrom('aryaak323@gmail.com', 'LMS_Support');
            $mail->addAddress($email);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Retrievel';
            $mail->Body    = "Hey User ,  Your Verification link is here ,Please Click on 
            <b><a href='http://localhost/library/verify.php?email=$email&&v_code=$v_code'>Verify</a></b><br>
            After Clicking On verify Link , Please Use <b>$pass</b> as temperory password<br>
            <h5>Authentication Rules</h5>
			<ul>
            <li>Immediate Login in Your Account after Getting Temporary Password</li>
				<li>Change Password after using Temporary Password</li>
				<li>Don't Share temporary Password With Anyone</li>
				<li>If You Feel Password is not accepted,again Go for Forgot Password!!!</li>
			</ul>";
            $mail->send();
           return true;
        } catch (Exception $e) {
           // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           return false;
        }
        }
        $v_code=bin2hex(random_bytes(16));
        $pass=rand(100000,999999);
        $query = "update users set password='$pass',verification_code='$v_code' where email='$_POST[email]'";
        
        if(mysqli_query($connection,$query)&& sendmail($_POST['email'],$v_code,$pass))
        {
    ?>
    <script type="text/javascript">
        alert("Please click on Verify email Sent to You!!!");
        window.location.href = "user_login.php";
    </script>
    <?php 
    }
 } else {
        ?>
        <script type="text/javascript">
            alert("Email does not exist");
            window.location.href = "forgot_password.php";
        </script>
        <?php
    }
    
}
?>