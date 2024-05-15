<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $user_id = $_POST['user_id'];
    $updatedData = $_POST['updatedData'];

    // Update the user data in the database
    $sql = "UPDATE user SET 
            name = '{$updatedData['name']}', 
            phno = '{$updatedData['phno']}', 
            email = '{$updatedData['email']}', 
            password = '{$updatedData['password']}' 
            WHERE uid = '{$user_id}'";

    if ($conn->query($sql) == TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $conn->error;
    }

    $conn->close();
}
?>
