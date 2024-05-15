<?php
// Start session
session_start();

// Access session variable
$uid = $_SESSION['uid'];

// Use the session variable as needed in your page
//echo "User ID: $uid";
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
            <div class="col-md-4">
                <a href="#python" class="btn btn-primary">Python</a>
                <a href="#java" class="btn btn-primary">Java</a>
                <a href="#excel" class="btn btn-primary">Excel</a>
                <a href="#js" class="btn btn-primary">Java Script</a>
                <a href="#datascience" class="btn btn-primary">Data Science</a>
            </div>
        </div>
        <div class="row border">
            <div class="col-md-10">
                <h2 id="python">Expand your career opportunity!</h2>
                <br>
                <p>Python is a high-level programming language that is easy to learn and also supports object-oriented programming. We use a subset of all colors to create a smaller color palette for generating color schemes, also available as Sass variables and a Sass map in Bootstrap's scss/_variables.scss file.</p>


            </div>

            <!-- video-card starts here -->
            <div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php //if ($enrolled): ?>
                            <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe> -->
                        <?php //else: ?>
                            <img src="../img/img1.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php //endif; ?>
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
                        <form action="user_enroll.php" method="post">
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

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

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
                    if ($result2->num_rows > 0) {
                        $fetch = mysqli_fetch_assoc($result2);
                        $tutor = $fetch['name'];
                        echo "<p class='card-text'>Tutor: " . $tutor . "</p>";
                    } else {
                        echo "<p class='card-text'>Tutor: Surya</p>";
                    }

                    // Rating stars
                    echo "<div class='d-flex'>";
                    for ($i = 0; $i < $row["rating"]; $i++) {
                        echo "<span class='text-warning'>&#9733;</span>";
                    }
                    echo "</div>";

                    // Enroll form
                    echo "<form action='user_enroll.php' method='post'>";
                    echo "<input type='hidden' name='cid' value='" . $row['cid'] . "'>";
                    echo "<button type='submit' class='btn btn-dark' name='enroll_btn'>Enroll</button>";
                    echo "</form>";

                    echo "</div>"; // Close card-body
                    echo "</div>"; // Close card
                    echo "</div>"; // Close col-md-3
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>


        </div>
    </div>

    <!-- Bootstrap JS bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
