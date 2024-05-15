<?php
include "dbconnection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to insert user details into the users table
    $stmt = $conn->prepare("INSERT INTO users (name, phone, email, password) VALUES (?, ?, ?, ?)");

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssss", $name, $phone, $email, $password);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record inserted successfully";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // Redirect to the registration page if accessed directly
    header("Location: register.php");
    exit;
}
?>
