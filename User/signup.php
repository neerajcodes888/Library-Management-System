<?php
session_start();
$msg='';
if(isset($_SESSION['email_alert']))
{
    $msg="Email already Exists";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="icon" href="https://e7.pngegg.com/pngimages/606/201/png-clipart-mississauga-library-system-school-library-public-library-online-public-access-catalog-library-miscellaneous-trademark-thumbnail.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            font-family: Arial, sans-serif;
            overflow-x: hidden;
            color: #333;
            /* Text color */
        }

        .navbar {
            background-color: #6c63ff;
            /* Navbar background color */
        }

        .navbar-brand,
        .navbar-text {
            color: #fff;
            /* Navbar text color */
        }

        .navbar-text {
            margin-right: 15px;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out; /* Fade In Animation */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .form-control {
            border-radius: 20px;
            border: none;
            background-color: #f8f9fa;
            /* Form input background color */
            padding: 15px;
            margin-bottom: 20px;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 12px 30px;
            background-color: #6c63ff;
            /* Button background color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #534bff;
            transform: scale(1.05); /* Button Hover Effect */
        }

        footer {
            background-color: #6c63ff;
            /* Footer background color */
            color: #fff;
            /* Footer text color */
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar_home.php') ?>

    <!-- Marquee -->
    <marquee style="background-color: lightblue; color: #333;"><b>Welcome to User Registration Form. Please fill all
            the fields correctly.</b></marquee>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="card">
                    <h5>Library Timing</h5>
                    <ul>
                        <li>Opening: 8:00 AM</li>
                        <li>Closing: 8:00 PM</li>
                        <li>(Sunday Off)</li>
                    </ul>
                    <h5>Facilities We provide ?</h5>
                    <ul>
                        <li>Full furniture</li>
                        <li>Free Wi-fi</li>
                        <li>News Papers</li>
                        <li>Discussion Room</li>
                        <li>RO Water</li>
                        <li>Peaceful Environment</li>
                    </ul>
                    <h5>How to Fill Form ?</h5>
                    <ul>
                        <li>Write Official Name.</li>
                        <li>Roll Number : College Provided</li>
                        <li>Fill Course & Department</li>
                        <li>Enter Correct Email & Phone Number</li>
                        <li>Fill strong password</li>
                        <li>Take preview of the Data</li>
                    </ul>
                    <h5>Some Constraints</h5>
                    <ul>
                        <li>All Fileds are required</li>
                        <li>Use Temporary Password For First Login
                            <li> If You Feel Password is not accepted,Contact US!!</li>
                            <li>Recheck Mobile Number</li>
                            <li>Recheck Email Address</li>
                            <li>Verify Roll Number</li>
                            <li>Match the information again</li>
                    </ul>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="col-md-8">
                <div class="card animate__animated animate__slideInRight">
                    <center>
                        <img src="images/registration_logo.png" alt="user login" width="120" height="100">
                        <h3><b>User Registration Form</b></h3>
                    </center>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id">Roll Number:</label>
                            <input type="text" name="id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="course">Course:</label>
                            <input type="text" name="course" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <input type="text" name="department" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" name="mobile" class="form-control" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" class="form-control" required></textarea>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Register</button>
                            <button type="reset" name="reset" class="btn btn-primary">Reset</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['email_alert']); ?>
    </div>

    <?php include('footer.php') ?>
</body>

</html>
