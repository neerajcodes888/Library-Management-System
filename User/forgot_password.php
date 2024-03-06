<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">


    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style type="text/css">
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            font-family: Arial, sans-serif;
        }

    #main_content {
        padding: 50px;
    }

    .card-body {
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 20px;
        padding: 20px;
        animation: fadeIn 1s;
        margin-bottom: 20px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-control {
        border-radius: 20px;
        border: none;
        background-color: #f8f9fa;
        padding: 15px;
        margin-bottom: 20px;
    }

    .btn-danger {
        border-radius: 20px;
        padding: 12px 30px;
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>

<body>
<?php include('navbar_home.php') ?>
 <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card-body">
                    <center>
                        <img src="images/forgot_password.png" alt="user login" width="120" height="100">
                        <h3><b><u>Forgot Password</u></b></h3>
                    </center>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email ID:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <center><button type="submit" name="forgot_password" class="btn btn-danger">Submit</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['forgot_password'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");
        $query = "select * from users where email = '$_POST[email]'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) == 1) {
            function sendmail($email, $pass)
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
                    $mail->Subject = 'Password Retrieval';
                    $mail->Body    = "Here, Please find the password retrieval process: <br> Please Use <center><h3><b>$pass</b></h3></center><br> as a temporary password<br>
                    <h1><u>Authentication Rules</u></h1>
                    <ul>
                    <li>Immediate Login in Your Account after Getting Temporary Password</li>
                    <li>Change Password after using Temporary Password</li>
                    <li>Don't Share temporary Password With Anyone</li>
                    <li>If You Feel Password is not accepted, again Go for Forgot Password!!!</li>
                    </ul>";
                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    return false;
                }
            }
            $pass = bin2hex(random_bytes(10));
            $query = "update users set password='$pass' where email='$_POST[email]'";
            if (mysqli_query($connection, $query) && sendmail($_POST['email'], $pass)) {
    ?>
                <script type="text/javascript">
                    swal({
                        title: 'Email Sent!',
                        text: 'Please Check your Email!',
                        type: 'success'
                    }).then(function () {
                        window.location.href = "user_dashboard.php";
                    })
                </script>
            <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                swal({
                    title: 'Oops!',
                    text: 'Email not found!',
                    type: 'error'
                }).then(function () {
                    window.location.href = "forgot_password.php";
                })
            </script>
    <?php
        }
    }
    ?>

<?php include('footer.php') ?>
</body>

    <!-- Optional: Include Bootstrap and other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-BJFZgVtXesqGyBA0xWzWnuYjnMO6I5gmvXJlba0//fPs9QxK8feGpNtW+4FtLv0AxJOM3lF6+b0/FMsIrkxfJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>
