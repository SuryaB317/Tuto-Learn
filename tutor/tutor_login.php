<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "tuto_learn";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Check credentials for tutor
    $sql_tutor = "SELECT * FROM tutor WHERE email = '$email' AND password = '$password'";
    $result_tutor = $conn->query($sql_tutor);

    if ($result_tutor->num_rows > 0) {
        // Tutor found, set session variables
        $tutor = $result_tutor->fetch_assoc();
        $_SESSION['tid'] = $tutor['tid'];
        $_SESSION['email'] = $tutor['email'];
        $_SESSION['name'] = $tutor['name'];
        // Redirect to tutor's index page
        header("Location: tutor_index.php");
        exit(); // Ensure that subsequent code is not executed after redirection
    } 

    // Check credentials for user
    $sql_user = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result_user = $conn->query($sql_user);

    if ($result_user->num_rows > 0) {
        // User found, set session variables
        $user = $result_user->fetch_assoc();
        $_SESSION['uid'] = $user['uid'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        // Redirect to user's index page
        header("Location: user_index.php");
        exit(); // Ensure that subsequent code is not executed after redirection
    } 

    // If no user or tutor found with provided credentials
    echo "Invalid email or password";
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In Page</title>
    <link rel="stylesheet" href="tutor_sigin.css">
</head>
<body>
    <div class="card">
        <div class="right-card">
            <span>
            <br>
            <a href="tutor_signin.php">Sign Up</a>
            <a href="tutor_login.php" class="active">LogIn</a>
            </span>
            <br>
            <br>
            <br>
            <form method="POST">
                <input type="email" name="Email" id="" placeholder="Email-id" required>
                <br>
                <input type="password" name="Password" id="" placeholder="Password" required>
                <br>
                <br>
                <br>
                <button type="submit" id="sub">Login</button>
            </form>
        </div>
        <div class="left-card">
            <h1><b>Empower Yourself With us</h1></b>
            <p>Join our community of 30 million+ learners, upskill with CPD UK accredited courses, explore career development tools and psychometrics - all for free.</p>
        </div>
    </div>
</body>
</html>
