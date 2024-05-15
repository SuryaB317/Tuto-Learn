<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_ViewTutor.php">View Tutor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_ViewUser.php">View User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_RemoveTutor.php">Delete Tutor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_RemoveVideo.php">Delete Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_Profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome, Admin!</h1>
            <p class="lead">This is a  home page for the Admin. You can customize it as per your requirements.</p>
            <hr class="my-4">
            <p>Feel free to explore the features available to you.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
