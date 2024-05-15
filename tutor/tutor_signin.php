<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Page</title>
    <link rel="stylesheet" href="tutor_sigin.css">
</head>

<body>

    <div class="card">
        <div class="right-card">
            <span>
                <br>
            <a href="#" class="active">Sign Up</a>
            <a href="tutor_login.php">LogIn</a>
            </span>


            <br>
            <br>
            <br>
            <form method="POST">
                <input type="text" name="Name" id="" placeholder="Username" required>
                
                <input type="text" name="edu" id="" placeholder="Education" required>
             
                <input type="number" name="Phone" id="" placeholder="PhoneNumber" required>
               
                <input type="email" name="Email" id="" placeholder="Email-id" required>
               
                <input type="password" name="Password" id="" placeholder="Password" required>
                <br>
               
                <button name="submit" id="sub">Register</button>
            </form>
        </div>
        <div class="left-card">
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
    $edu = $_POST['edu'];
    $phno = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Generate a unique tutor ID
    $tid = generateUniqueTutorID($conn);

    // Insert data into the database
    $sql = "INSERT INTO tutor (tid, name, edu, phno, email, password) 
            VALUES ('$tid', '$name', '$edu', '$phno', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. Your TID is: $tid";
        header("Location: Successfull-signin.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Function to generate a unique tutor ID
function generateUniqueTutorID($conn) {
    $prefix = 'TA'; // You can adjust the prefix as needed
    $tid = "";

    do {
        // Generate a random number
        $random_number = mt_rand(1, 999);
        $tid = $prefix . sprintf("%03d", $random_number);
        
        // Check if the generated ID already exists in the database
        $check_sql = "SELECT * FROM tutor WHERE tid = '$tid'";
        $result = $conn->query($check_sql);
        
        if ($result && $result->num_rows == 0) {
            // If the ID doesn't exist, break the loop
            break;
        }
    } while (true);

    return $tid;
}
?>
