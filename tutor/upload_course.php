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
                <li><a href="delete_course.php">Delete Courses</a></li>
                <li><a href="tutor_view_course.php">View Courses</a></li>
                <li><a href="update_course.php">Update Courses</a></li>
            </ul>
        </div>
        <!-- /#sidebar -->

        <!-- Page Content -->
        <div id="content" class="container mt-5 bg-light p-3 l-3 rounded custom-container">
            <h2 class="text-center mb-2">Upload Course Details</h2>
            <form action="upload_course.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="course_name" class="form-label">Course Name:</label>
                    <input type="text" id="course_name" name="course_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" cols="50" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="course_concept" class="form-label">Course Concept:</label>
                    <select id="course_concept" name="course_concept" class="form-select" required>
                        <option value="Programming">Programming</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Web Development">Web Development</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <!-- <div class="mb-3">
                    <label for="tutor_name" class="form-label">Tutor Name:</label>
                    <input type="text" id="tutor_name" name="tutor_name" class="form-control" required>
                </div> -->
                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL:</label>
                    <input type="text" id="video_url" name="video_url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail Image:</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" required accept="image/*">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /#content -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

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

    if (isset($_POST['submit'])) {
        // Form data
        $course_name = $_POST['course_name'];
        $description = $_POST['description'];
        $course_concept = $_POST['course_concept']; // Changed from course_concept to tag
        $tutor_id = $_SESSION['tid']; // Assuming tutor_id is stored in session
        $video_url = $_POST['video_url'];

        $thumbnail_path = "C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/";

        if (isset($_FILES['thumbnail']['tmp_name'])) {
            $thumbnail_name = basename($_FILES['thumbnail']['name']);
            $thumbnail_destination = $thumbnail_path . $thumbnail_name;
            $tmp_path = $_FILES['thumbnail']['tmp_name'];

            $success = move_uploaded_file($tmp_path, $thumbnail_destination);

            // Move the uploaded file to the destination
            if ($success) {
                echo "File uploaded successfully. ";
                echo "Path: " . $thumbnail_destination;
            } else {
                echo "Error moving file to destination.";
            }
        } else {
            // Handle the case where 'thumbnail' is not set
            $thumbnail_destination = "img/thumbnail/ptrain.jpg"; // or provide a default path
        }

        // Generate CID based on existing ID logic
        // You can replace this logic based on your actual implementation
        // For example, if your CID is based on the existing number of records, you can query the count
        $cidsql = "SELECT COUNT(*) as count FROM course";
        $result = $conn->query($cidsql);

        if ($result) {
            $count = $result->fetch_assoc()['count'] + 1;
            $cid = "CA" . ceil($count / 10) . sprintf("%02d", ($count % 10) + 1);

            // Fetch tutor name
            $sql_tutor = "SELECT name FROM tutor WHERE tid='$tutor_id'";
            $result_tutor = $conn->query($sql_tutor);
            $tutor_name = "";
            if ($result_tutor->num_rows > 0) {
                $row_tutor = $result_tutor->fetch_assoc();
                $tutor_name = $row_tutor['name'];
            }

            // Insert data into the database
            $sql = "INSERT INTO course (cid, course_title, discription, tid, rating, tag, link, thumbnail, tutor_name) 
                    VALUES ('$cid', '$course_name', '$description', '$tutor_id', '2', '$course_concept', '$video_url', '$thumbnail_destination', '$tutor_name')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error fetching count: " . $conn->error;
        }

        $conn->close();
    }
?>
