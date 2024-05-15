<?php
// Check if the enroll button is clicked
if (isset($_POST['enroll_btn'])) {
    // Assuming you have a session or some authentication mechanism to identify the user
    $user_id = 123; // Replace this with the actual user ID or fetch it from your session

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tuto_learn";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the course ID from the form
    $course_id = $_POST['course_id'];
    

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO enrolled_courses (user_id, course_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $course_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
