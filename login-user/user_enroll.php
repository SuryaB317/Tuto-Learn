<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with the actual login page URL
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both user ID and course ID are present
    if (isset($_SESSION['uid']) && isset($_POST['cid'])) {
        // Get user ID and course ID
        $uid = $_SESSION['uid'];
        $cid = $_POST['cid'];

        // Debugging statements
        echo "Session UID: " . $_SESSION['uid'] . "<br>";
        echo "POST CID: " . $_POST['cid'] . "<br>";
        echo "User ID: " . $uid . "<br>";
        echo "Course ID: " . $cid . "<br>";

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

        // Execute SQL query to insert data into enrolled_courses table
        $sql = "INSERT INTO enrolled_courses (uid, cid) VALUES ('$uid', '$cid')";

        if ($conn->query($sql) === TRUE) {
            echo "Enrollment successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        // Handle case when user ID or course ID is not set
        echo "User ID or Course ID is missing!";
    }
} else {
    // Handle case when the form is not submitted
    echo "Form submission error!";
}
?>
