<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Page</title>
    <link rel="stylesheet" href="sign-in.css">
</head>

<body>

    <div class="card">
        <div class="right-card">
            <span>
                <br>
            <a href="#" class="active">Sign Up</a>
            <a href="login.php">LogIn</a>
            </span>


            <br>
            <br>
            <br>
            <form method="POST">
                <input type="text" name="Name" id="" placeholder="Username" required>
                <br>
                <input type="number" name="Phone" id="" placeholder="PhoneNumber" required>
                <br>
                <input type="email" name="Email" id="" placeholder="Email-id" required>
                <br>
                <input type="password" name="Password" id="" placeholder="Password" required>
                <br>
                <br>
                <button name="submit" id="sub">Register</button>
            </form>

            <div class="spare">
                <span>
                    <p>Already have a Account?</p>
                </span>
                <a href="login.php">Login Here!</a>

            </div>
        </div>
        <div class="left-card">
            <!-- <img src="img/signup1.png" alt="Signup-img"> -->
            <h1><b>Empower Yourself With us</h1></b>
                <p>Join our community of 30 million+ learners, upskill with CPD UK accredited courses, explore career development tools and psychometrics - all for free.</p>
        </div>
    </div>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $name = $_POST['Name'];
    $phno = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Generate UID based on existing ID logic
    // You can replace this logic based on your actual implementation
    // For example, if your UID is based on the existing number of records, you can query the count
    $uidsql = "SELECT COUNT(*) as count FROM user";
    $result = $conn->query($uidsql);

    if ($result) {
        $count = $result->fetch_assoc()['count'] + 1;
        $prefix = ($count <= 100) ? 'UA' : 'UB';
        $uid = $prefix . sprintf("%03d", ($count % 100) + 1);

        // Insert data into the database
        $sql = "INSERT INTO user (uid, name, phno, email, password) 
            VALUES ('$uid', '$name', '$phno', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. Your UID is: $uid";
            header("Location: Successfull-signin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error fetching count: " . $conn->error;
    }

    $conn->close();
}
?>