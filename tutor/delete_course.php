<?php
// Check if course ID is provided
if (isset($_GET['course_id'])) {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = ""; // Replace with your actual database password
    $database = "tuto_learn";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to delete course from the database
    $stmt = $conn->prepare("DELETE FROM courses WHERE course_id = ?");
    $stmt->bind_param("s", $course_id);

    // Get course ID from the URL parameter
    $course_id = $_GET['course_id'];

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Delete the corresponding file from the server
        $file_path = "thumbnails/" . $course_id . ".jpg"; // Assuming the file name is based on the course ID
        if (file_exists($file_path)) {
            unlink($file_path); // Delete the file
        }
        echo "Course deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Course ID not provided!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($success_msg)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_msg; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($error_msg)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_msg; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>