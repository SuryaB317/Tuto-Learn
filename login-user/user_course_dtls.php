<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

// Check if the course ID is provided
if (!isset($_POST['cid'])) {
    echo "Course ID is not provided.";
    exit();
}

$course_id = $_POST['cid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uesr Course Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tuto_learn";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve course details based on course ID
        $sql = "SELECT * FROM course WHERE cid = '$course_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>" . $row['course_title'] . "</h1>";
            echo "<p>Tutor: " . $row['tutor'] . "</p>";
            echo "<p>Description: " . $row['description'] . "</p>";
            // Add more details as needed
        } else {
            echo "Course not found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
