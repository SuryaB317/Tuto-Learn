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

    // You can also access other tutor information stored in session variables if needed
    $tutor_name = $_SESSION['name']; // Assuming 'name' is the name of the column storing the tutor's name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Course Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vk55o3udW7JW/nx6Ql25b56dCZBfBfL4FWi8R3+IorGzGM2W/tbrJn3LkMz0hz8R" crossorigin="anonymous">
    <style>
        .custom-container {
            max-width: 800px; /* Set your desired max-width */
        }
        
        body {
            font-family: Arial, sans-serif;
        }
        
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #333;
            color: #fff;
            transition: all 0.3s;
            height: 120vh;
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
<body class="bg-primary">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar">
            <div class="sidebar-heading">
                <img src="../img/img6.png" alt="Profile Image">
                <p id="userName" class="text-center"><?php echo $tutor_name; ?></p>
            </div>
            <ul class="list-unstyled components">
                <li><a href="tutor_index.php">Home</a></li>
                <!-- <li><a href="../user_profile_pic.php">Edit Photo</a></li> -->
                <li><a href="upload_course.php">Upload Courses</a></li>
                <li><a href="update_course.php">Update Courses</a></li>
                        </ul>
        </div>
        <!-- /#sidebar -->

        <!-- Page Content -->
        <div id="content" class="container mt-5 bg-light p-3 l-3 rounded custom-container">
            <h2 class="text-center mb-2">Upload Course Details</h2>
            <form action="upload_course.php" method="post" enctype="multipart/form-data">
                <!-- Form for uploading course details -->
            </form>

            <hr> <!-- Added horizontal line to separate upload form and uploaded courses -->

            <h2 class="text-center mb-2">Uploaded Courses</h2>
            <div class="row">
                <!-- PHP code to fetch and display uploaded courses -->
                <?php
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = ""; // Replace with your actual database password
                    $database = "tuto_learn";

                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch courses uploaded by the current tutor
                    $sql = "SELECT * FROM course WHERE tid='$tutor_id'"; // Corrected variable name
                    $result = $conn->query($sql);

                    // Display each uploaded course
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-6'>";
                        echo "<div class='card mb-3'>";
                        echo "<div class='row no-gutters'>";
                        echo "<div class='col-md-4'>";
                        echo "<img src='../img/thumbnail/" . basename($row['thumbnail']) . "' class='card-img-top' alt='Thumbnail'>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row['course_title'] . "</h5>";
                        echo "<p class='card-text'>" . $row['discription'] . "</p>";
                        echo "<p class='card-text'><small class='text-muted'>Tutor: " . $tutor_name . "</small></p>"; // Corrected variable name
                        //echo "<a href='upload_quiz.php?course_id=" . $row['cid'] . "' class='btn btn-primary'>Add Quiz</a>"; // Link to add_quiz.php with course ID as a parameter
                        echo "<a href='upload_quiz.php?course_id=" . $row['cid'] . "' class='btn btn-primary'>Add Quiz</a>";
                        
                        
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }

                    $conn->close();
                ?>
            </div>
        </div>
        <!-- /#content -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
