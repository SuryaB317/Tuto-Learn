<?php
// Start the session
session_start();

// Check if the tutor is logged in, if not, redirect to the login page
if (!isset($_SESSION['tid'])) {
    header("Location: tutor_login.php");
    exit(); // Ensure that subsequent code is not executed after redirection
}

// Now, you can access the tutor's ID from the session variable $_SESSION['tid']
$tutor_id = $_SESSION['tid'];
$tutor_name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #333;
            color: #fff;
            transition: all 0.3s;
            height: 90vh;
        }
        
        #sidebar.active {
            width: 80px;
        }
        
        #sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 20px auto;
            display: block;
        }
        
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #4e4e4e;
        }
        
        #sidebar ul li a {
            padding: 10px;
            font-size: 1.2em;
            display: block;
            color: #fff;
            transition: all 0.3s;
        }
        
        #sidebar ul li a:hover {
            background-color: #555;
        }
        
        #content {
            margin-left: 250px;
            padding: 16px;
        }
        
        #content .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <!-- navbar-starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">Tuto Learn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="tutor_index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tutor_logout.php">Logout</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <!-- nav-bar ends -->
    <div class="d-flex" id="wrapper">
        <div class="bg-dark border-right" id="sidebar">
            <div class="sidebar-heading">
                <img src="../img/img6.png" alt="Profile Image">
                <p id="userName" class="text-center"><?php echo $tutor_name; ?></p>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="tutor_index.php">Home</a>
                </li>
                <li><a href="upload_course.php">Upload Courses</a></li>
                <li><a href="tutor_view_course.php">View Courses</a></li>
                <li><a href="update_course.php">Update Courses</a></li>
                <li><a href="../user_profile_pic.php">Edit Photo</a></li>
            </ul>
        </div>
        <div class="container mt-5">
            <div class="jumbotron">
                <h1 class="display-4">Welcome, <?php echo $tutor_name; ?>!</h1>
                <p class="lead">This is your home page as a tutor. You can customize it as per your requirements.</p>
                <hr class="my-4">
                <p>Feel free to explore the features available to you.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
