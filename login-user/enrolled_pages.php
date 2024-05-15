<?php
$enrolled = array(); // Define the $enrolled variable as an empty array
// Check if the enroll button is clicked
session_start();
if (isset($_POST['enroll_btn'])) {
    // Assuming you have a session or some authentication mechanism to identify the user
    if (!isset($_SESSION['uid'])) 
    {
        echo "<script>alert('login and enroll for the course');
              redirect('login.php');</script>";

    }
    else{

    $uid = $_SESSION['uid']; // Replace this with the actual user ID or fetch it from your session

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

    // Get the course ID from the form
    $course_id = $_POST['cid'];
// Fetch the maximum ID from the enrolled_courses table
$query = "SELECT MAX(SUBSTRING(eid, 3)) AS max_id FROM enrolled_courses";
$result = $conn->query($query);

if ($result === false) {
    die("Error in query: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latest_id = $row['max_id'];
} else {
    // If no records found, start from the beginning
    $latest_id = 0;
}

// Increment the ID
$new_id = ++$latest_id;

// Generate the formatted ID (e.g., EA001, EA002, ..., EA100, EB001, ...)
$alpha_part = 'EA'; // Assuming a constant prefix
$numeric_part = sprintf('%03d', $new_id);

$eid = $alpha_part . $numeric_part;

//--checking already registered or not----------
$query2 = "SELECT eid FROM enrolled_courses where cid='".$course_id."' AND uid= '".$user_id."'";
$result2 = $conn->query($query2);

if ($result2 === false) {
    die("Error in query: " . $conn->error);
}

if ($result2->num_rows == 0) {

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO enrolled_courses (eid,uid, cid) VALUES (?, ?,?)");
    $stmt->bind_param("sss", $eid,$uid, $course_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
else{
    echo "<script>alert('Already registered for this course');</script>";
}
    // Close statement and database connection  
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Page</title>

    <!-- links -->
    <link rel="stylesheet" href="home_page.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>

</style>

</head>

<body>
    <?php include 'user_navbar.php'; ?>

    <div class="container mt-5">
        <h1>A broad selection of Courses</h1>
        <div class="row">
            <!-- <div class="col-md-4">
                <a href="#python" class="btn btn-primary">Python</a>
                <a href="#java" class="btn btn-primary">Java</a>
                <a href="#excel" class="btn btn-primary">Excel</a>
                <a href="#js" class="btn btn-primary">Java Script</a>
                <a href="#datascience" class="btn btn-primary">Data Science</a>
            </div> -->
        </div>
        <div class="row border">
            <div class="col-md-10">
                <h2 id="python">Expand your career opportunity by using TutoLearn</h2>
                <br>
                <p>Enhance your skills and knowledge by the help of this courses.</p>

    
            </div>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- video-card starts here -->
            <div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="../img/img1.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php endif; ?>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Course name -->
                        <h5 class="card-title">The Complete Python Full Stack Development Course</h5>

                        <!-- Tutor name -->
                        <p class="card-text">Tutor: SALAR</p>

                        <!-- Star rating -->
                        <div class="d-flex">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-secondary">&#9733;</span>
                        </div>
                        <form action="enroll.php" method="post">
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>
<!-- fetch from table -->
<?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tuto_learn";
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM course;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='col-md-3'>";
            echo "<div class='card'>";

            // Thumbnail image
            echo "<div class='embed-responsive embed-responsive-16by9'>";
            echo "<img src='../img/thumbnail/" . basename($row['thumbnail']) . "' class='card-img-top' alt='Thumbnail'>";
            echo "</div>";

            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row["course_title"] . "</h5>";

            // Fetch tutor name
            $sql2 = "SELECT name FROM tutor WHERE tid='" . $row['tid'] . "'";
            $result2 = $conn->query($sql2);
            if ($result2 !== false && $result2->num_rows > 0) {
                $fetch = mysqli_fetch_assoc($result2);
                $tutor = $fetch['name'];
                echo "<p class='card-text'>Tutor: " . $tutor . "</p>";
            } else {
                echo "<p class='card-text'>Tutor: Not Available</p>";
            }

            // Rating stars
            echo "<div class='d-flex'>";
            for ($i = 0; $i < $row["rating"]; $i++) {
                echo "<span class='text-warning'>&#9733;</span>";
            }
            echo "</div>";

            // Enroll form
            echo "<form method='post'>";
            echo "<input type='hidden' name='course_id' value='" . $row['cid'] . "'>";
            //--checking already registered or not----------
            $query2 = "SELECT enrollment_id FROM enrolled_courses where cid='" . $row['cid'] . "' AND uid= '" . $_SESSION['uid'] . "'";
            $result2 = $conn->query($query2);
            if ($result2 !== false && $result2->num_rows == 0) {
                echo "<button type='submit' class='btn btn-dark' name='enroll_btn'>Enroll</button>";
            } else {
                echo "<a href='user_course_dashboard.php?cid={$row['cid']}' onclick=\"location.href='user_course_dashboard.php?cid={$row['cid']}'; return false;\">
                        <button type='button' class='btn btn-dark' name='start'>Start</button>
                    </a>";
            }
            echo "</form>";

            echo "</div>"; // Close card-body
            echo "</div>"; // Close card
            echo "</div>"; // Close col-md-3
        }
    } else {
        echo "No courses found.";
    }
?>


                </div>
            </div>
        </div>
    </div>
  
    <!-- Bootstrap JS bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
