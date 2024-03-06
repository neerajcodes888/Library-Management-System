<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-3" href="index.php" style="color:whitesmoke">Library Management System (LMS)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Register</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="admin/index.php">Admin Login</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
        </ul>
    </div>
</nav>

<style>
    .navbar-nav .nav-item .nav-link {
        transition: transform 0.3s;
    }

    .navbar-nav .nav-item .nav-link:hover {
        animation: textHover 0.5s infinite alternate;
    }

    @keyframes textHover {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }
</style>
