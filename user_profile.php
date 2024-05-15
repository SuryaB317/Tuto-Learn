<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #333;
            color: #fff;
            transition: all 0.3s;
            height: 90vh;
        }
        
        #sidebar.active {
            width: 80px;
        }
        
        #sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 20px auto;
            display: block;
        }
        
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #4e4e4e;
        }
        
        #sidebar ul li a {
            padding: 10px;
            font-size: 1.2em;
            display: block;
            color: #fff;
            transition: all 0.3s;
        }
        
        #sidebar ul li a:hover {
            background-color: #555;
        }
        
        #content {
            margin-left: 250px;
            padding: 16px;
        }
        
        #content .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>

</head>


<body>
    <!-- navbar-starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">Learning Platform</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="course.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">More</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0 mr-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <!-- nav-bar ends -->
    <div class="d-flex" id="wrapper">

        <div class="bg-dark border-right" id="sidebar">
            <div class="sidebar-heading">
                <img src="img3.jpg" alt="Profile Image">
                <p id="userName" class="text-center">User Name</p>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#Profile">Profile</a>
                </li>
                <li><a href="user_profile_pic.html">Edit Photo</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Certificate</a></li>
                <li><a href="#" onclick="signOut()">Sign Out</a></li>
            </ul>
        </div>

        <div id="content">
            <div class="container-fluid">
                <!-- Your Profile Content Goes Here -->
                <?php
$user_id = "UA002";

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

// Fetch user data from the database
$sql = "SELECT name, phno, email, password FROM user WHERE uid = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<!-- Your Profile Content Goes Here -->
<h2>Profile</h2>
<form id="profileForm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" value='<?php echo $row["name"]; ?>' placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="phno">Phone Number:</label>
        <input type="text" class="form-control" id="phno" value='<?php echo $row["phno"]; ?>' placeholder="Enter your phone number">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" value='<?php echo $row["email"]; ?>' placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" value='<?php echo $row["password"]; ?>' placeholder="Enter your password">
    </div>

    <button type="button" name="submit" class="btn btn-primary" onclick="saveDetails()">Save</button>
</form>


            </div>
        </div>
    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function signOut() {
            // Implement sign-out functionality
            alert('Signing out...');
        }

        function saveDetails() {
            // Implement save details functionality
            var firstName = document.getElementById('firstName').value;
            var lastName = document.getElementById('lastName').value;
            var headline = document.getElementById('headline').value;
            var country = document.getElementById('country').value;
            var youtubeLink = document.getElementById('youtubeLink').value;
            var linkedinLink = document.getElementById('linkedinLink').value;

            // Send data to the server and save in the database
            // You need to implement this part using a back-end language and database
            alert('Details saved:\nFirst Name: ' + firstName + '\nLast Name: ' + lastName + '\nHeadline: ' + headline + '\nCountry: ' + country +
                '\nYouTube: ' + youtubeLink + '\nLinkedIn: ' + linkedinLink);
        }
    </script>

    </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function signOut() {
            // Implement sign-out functionality
            alert('Signing out...');
        }
    </script>
<script>
    function saveDetails() {
        // Capture the updated data
        var updatedData = {
            name: $('#name').val(),
            phno: $('#phno').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        // Send an AJAX request to update the data
        $.ajax({
            type: 'POST',
            url: 'update_profile.php', // Create this PHP file to handle the update
            data: { user_id: '<?php echo $user_id; ?>', updatedData: updatedData },
            success: function(response) {
                alert(response); // Display the response from the server (e.g., success message)
            },
            error: function() {
                alert('Error updating data');
            }
        });
    }
</script>

</body>

</html>