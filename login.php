<?php
// Start session
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT uid, email, name FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, set session variables and redirect to user home page
        $user = $result->fetch_assoc();
        $_SESSION['uid'] = $user['uid']; // Store uid in session
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $stmt->close();
        $conn->close();
        header("Location: login-user/user_home.php");
        exit(); // Ensure that subsequent code is not executed after redirection
    } else {
        // Invalid credentials
        $error = "Invalid email or password";
    }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In Page</title>
    <link rel="stylesheet" href="sign-in.css">
</head>

<body>
    <div class="card">
        <div class="right-card">
            <span>
                <br>
                <a href="sign-in.php">Sign Up</a>
                <a href="login.php" class="active">LogIn</a>
            </span>
            <br>
            <br>
            <br>
            <form method="POST">
                <input type="email" name="Email" id="" placeholder="Email-id" required>
                <br>
                <input type="password" name="Password" id="" placeholder="Password" required>
                <br>
                <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?> <!-- Display error message -->
                <br>
                <button name="submit" id="sub">Login</button>
            </form>
        </div>
        <div class="left-card">
            <!-- <img src="img/signup1.png" alt="Signup-img"> -->
            <h1><b>Empower Yourself With us</h1></b>
            <p>Join our community of 30 million+ learners, upskill with CPD UK accredited courses, explore career development tools and psychometrics - all for free.</p>
        </div>
    </div>

</body>

</html>
