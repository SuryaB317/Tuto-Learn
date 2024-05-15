<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are correct
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        // Authentication successful, redirect to admin dashboard
        $_SESSION['admin'] = true;
        header("Location: admin_home.php");
        exit;
    } else {
        // Authentication failed, show error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In Page</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>
    <div class="card">
        <div class="right-card">
            <span>
            <br>
        <a href="login.php"class="active"> Admin LogIn</a>
        </span>
            <br>
            <br>
            <br>
            <form action="POST">
                <input type="email" name="Email" id="" placeholder="Email-id" required>
                <br>
                <input type="password" name="Password" id="" placeholder="Password" required>
                <br>
                <br>
                <br>
                <a href="admin_home.php" id="sub">Login</a>
            </form>
        </div>
        <div class="left-card">
           
            <h1><b>Empower Yourself With us</h1></b>
                <p>Join our community of 30 million+ learners, upskill with CPD UK accredited courses, explore career development tools and psychometrics - all for free.</p>
        </div>
    </div>

</body>
</html>