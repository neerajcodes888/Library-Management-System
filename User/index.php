<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>

        	<link rel = "icon" href = 
"https://e7.pngegg.com/pngimages/606/201/png-clipart-mississauga-library-system-school-library-public-library-online-public-access-catalog-library-miscellaneous-trademark-thumbnail.png" 
        type = "image/x-icon">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: red;
            font-family: sans-serif;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .carousel-inner>.carousel-item>img {
            width: 100%;
            height: 500px;
        }

        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            font-family: Arial, sans-serif;
        }

        .card {
    width: 100%; /* Make all cards occupy full width */
    
}

.card-img-top {
    width: 100%; /* Make all images occupy full width of the card */
    height: 200px; /* Set a fixed height for the images */
    object-fit: cover; /* Ensure the image covers the entire space */
}

    </style>
</head>

<body>
    <?php include('navbar_home.php') ?>
<marquee style="background-color: lightblue;">
    <b>Welcome to Library Management System. Explore our collection and <a href="signup.php">Sign
                            Up</a> to access more features.</b>
    </marquee>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/bg1.jpg" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item">
                <img src="images/bg3.jpg" class="d-block w-100" alt="image2">
            </div>
            <div class="carousel-item">
                <img src="images/bg10.jpg" class="d-block w-100" alt="image3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br>

    <div class="card" style="background-color: lightblue;">
        <div class="card-body">
            <marquee class="blink">
                <h3>
                    <i class="bi bi-newspaper"></i> Welcome to Public Notification Panel. Stay updated with the latest
                    news and announcements. Thank you!
                </h3>
            </marquee>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow h-100">
                        <img class="card-img-top" src="images/bg4.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Chairs and study tables has been  provided for the students to focus on their studies and all.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow h-100">
                        <img class="card-img-top" src="images/bg6.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Magazines are organized for easy access based on fields of interest.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow h-100">
                        <img class="card-img-top" src="images/bg5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Borrow books and return within 30 days. Late fine of 1 rupee per day.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow h-100">
                        <img class="card-img-top" src="images/bg7.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Bookshelves organized by departments for easy book selection.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow h-100">
                        <img class="card-img-top" src="images/bg11.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Water purifier available. Please close tap after use.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow h-100">
                        <img class="card-img-top" src="images/bg9.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Desktops with internet access provided for various tasks.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
