<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Video</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #007bff; /* Set background color to primary */
            color: #fff; /* Set text color to white */
            padding-top: 50px; /* Add padding to the top */
        }
        .container {
            max-width: 800px; /* Set max-width for better layout */
        }
        .video-container {
            border: 1px solid #fff; /* Add border to the video container */
            border-radius: 10px; /* Add border radius for rounded corners */
            overflow: hidden; /* Hide overflow */
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if(isset($_GET['cid'])) {
        // Retrieve the value of 'cid'
        $courseId = $_GET['cid'];

        // Now you can use $courseId in your code
       // echo "Course ID: " . $courseId;
    } else {
        // Handle the case when 'cid' is not set
        echo "Course ID is not set in the URL.";
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tuto_learn";
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM course where cid='".$courseId."';";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error in query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $videoUrl = $row['link'];
        $videoId = substr($videoUrl, strrpos($videoUrl, '/') + 1);

        echo "<h1 class='text-center'>".$row['course_title']."</h1>";
        // Output the iframe HTML within a container div
        echo '<div class="video-container">';
        echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
        echo '</div>';
        // Add the Start button with a form submission to redirect
        echo '<form action="../quiz/quiz_home.php" method="get" class="text-center mt-3">';
        echo '<input type="hidden" name="cid" value="'.$courseId.'">';
        echo '<button type="submit" class="btn btn-dark">Start</button>';
        echo '</form>';
    }
    ?>
</div>

<!-- Bootstrap JS bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
