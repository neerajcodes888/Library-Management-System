<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="user_dashboard.php">Library Management System (LMS)</a>
        </div>
        <div class="navbar-text mx-auto">
            <font style="color: white"><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></font>
        </div>
        <div class="navbar-text mx-auto">
            <font style="color: white"><strong>ID: <?php echo $_SESSION['id']; ?></strong></font>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?></a>
                    <div class="dropdown-menu animated flip">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="feedback.php">Feedback & Complaint</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="feed_response.php">Feedback Response</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link animated rubberBand" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .navbar-brand {
        font-weight: bold;
    }
    
    .navbar-text {
        text-align: center;
        flex-grow: 1;
        margin-right: 20px;
    }
    
    .navbar-nav .nav-item .nav-link {
        padding: 8px 15px;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s;
    }
    
    .navbar-nav .nav-item .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        transform: scale(0.9); /* Zoom out effect */
    }
    
    .dropdown-menu {
        background-color: #343a40;
        border: none;
    }
    
    .dropdown-menu .dropdown-item {
        color: #ffffff;
    }
    
    .dropdown-menu .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    @media (max-width: 768px) {
        .navbar-text {
            margin: 0;
            order: 2;
        }
        .navbar-collapse {
            order: 1;
        }
        .navbar-toggler {
            order: 3;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
