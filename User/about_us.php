<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="https://e7.pngegg.com/pngimages/606/201/png-clipart-mississauga-library-system-school-library-public-library-online-public-access-catalog-library-miscellaneous-trademark-thumbnail.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
            background: linear-gradient(to right, #0072ff, #00c6ff);
        }

        .container {
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .contact-form {
            background: #fff;
            padding: 4%;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-image img {
            border-radius: 50%;
            width: 15%;
            transform: rotate(29deg);
        }

        .contact-form form .row {
            margin-bottom: -7%;
        }

        .contact-form h3 {
            margin-bottom: 8%;
            text-align: center;
            color: #0062cc;
        }

        .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: #dc3545;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        @media(max-width: 576px) {
            .contact-image img {
                width: 25%;
            }
            .btnContact {
                width: 100%;
            }
        }

        .footer {
            background-color: #6c63ff;
            /* Footer background color */
            color: #fff;
            /* Footer text color */
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .footer p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<?php include('navbar_home.php') ?>
<span>
    <marquee class="animate__animated animate__slideInLeft" style="background-color:lightblue"><b>This about-us page will tell you more about us like our vision and also the members of LMS(Officials)! In case of any doubt or any kind of help, please contact the members.</b></marquee>
</span>
<section class="about-us py-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class='text-success animate__animated animate__bounceInLeft'>Welcome!</h1>
                <h2 class="animate__animated animate__fadeInDown">Know More About Us</h2>
                <hr class="animate__animated animate__fadeIn">
                <p class="animate__animated animate__fadeInLeft">Welcome to our Library Management System, a state-of-the-art software application designed to streamline library operations and enhance the user experience for both library staff and patrons. Our system is dedicated to empowering libraries to efficiently manage their resources, deliver exceptional services, and foster a love for learning and knowledge.</p>
                <h2 class="animate__animated animate__fadeInUp">Our Mission:</h2>
                <p class="animate__animated animate__fadeInRight">At Library Management System, our mission is to revolutionize the way libraries operate by providing an innovative and comprehensive solution that simplifies complex tasks and optimizes day-to-day operations. We are committed to supporting libraries in their mission to promote literacy, education, and community engagement.</p>
                <h2 class="animate__animated animate__fadeInLeft">Join Us Today:</h2>
                <p class="animate__animated animate__fadeInRight">Experience the power of our Library Management System and unlock the full potential of your library. Join us on this journey to create a dynamic, resourceful, and engaging environment for your library patrons. Together, we can make a positive impact on the lives of countless learners and knowledge seekers. Let's build a brighter future, one book at a time.</p>
            </div>
            <div class="col-md-6">
                <img src="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/seo-slide.png" class="img-fluid animate__animated animate__flipInX" alt="">
            </div>
        </div>
    </div>
</section>
<section class="contact-us py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form animate__animated animate__fadeIn">
                    <div class="contact-image">
                        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact">
                    </div>
                    <form method="post">
                        <h3>Drop Us a Message</h3>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject *" required>
                        </div>
                        <div class="form-group">
                            <textarea name="msg" class="form-control" placeholder="Your Message *" style="height: 150px;" required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary btnContact">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php') ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</body>
</html>
