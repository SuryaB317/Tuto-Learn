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
    <?php include 'navbar.php'; ?>

    <?php
$enrolled = array(); // Define the $enrolled variable as an empty array
// Check if the enroll button is clicked
if (isset($_POST['enroll_btn'])) {
    // Assuming you have a session or some authentication mechanism to identify the user
    $user_id = 123; // Replace this with the actual user ID or fetch it from your session

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
    $course_id = $_POST['course_id'];

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO enrolled_courses (user_id, course_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $course_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and database connection
   
   
}
?>

    <div class="container mt-5">
        <h1>A broad selection of Courses</h1>

        <div class="row">
            <div class="col-md-4">
                <a href="#python" class="btn btn-primary">Python</a>
                <a href="#Java" class="btn btn-primary">Java</a>
                <a href="#Excel" class="btn btn-primary">Excel</a>
                <a href="#js" class="btn btn-primary">Java Script</a>
                <a href="#datascience" class="btn btn-primary">Data Science</a>
            </div>
        </div>
        <div class="row border">
            <div class="col-md-10">
                <h2 id="python">Expand your career opportunity in Python</h2>
                <br>
                <p>Python is a high-level programming language that is easy to learn and also supports object-oriented programming. We use a subset of all colors to create a smaller color palette for generating color schemes, also available as Sass variables and a Sass map in Bootstrap's scss/_variables.scss file.</p>

    
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
                            <img src="img/img1.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
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
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div> 
<div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img2.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
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
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>
 <!-- video-card starts here -->
 <div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img3.jpg" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
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
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>
 <!-- video-card starts here -->
 <div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img4.jpg" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
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
                        <form>
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>

<div class="row border">
            <div class="col-md-10">
                <h2 id="Excel">Expand your career opportunity in Excel</h2>
                <br>
                <p>Excel is a high-level programming language that is easy to learn and also supports object-oriented programming. We use a subset of all colors to create a smaller color palette for generating color schemes, also available as Sass variables and a Sass map in Bootstrap's scss/_variables.scss file.</p>

    
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
                            <img src="img/img1.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php endif; ?>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Course name -->
                        <h5 class="card-title">The Complete Python Full Stack Development Course</h5>

                        <!-- Tutor name -->
                        <p class="card-text">Tutor: Surya</p>

                        <!-- Star rating -->
                        <div class="d-flex">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-secondary">&#9733;</span>
                        </div>
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div> 
<div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img6.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
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
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>
<div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img2.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php endif; ?>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Course name -->
                        <h5 class="card-title">The Complete Excel Course</h5>

                        <!-- Tutor name -->
                        <p class="card-text">Tutor: Raja Krishnappa Veriaya</p>

                        <!-- Star rating -->
                        <div class="d-flex">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-secondary">&#9733;</span>
                        </div>
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>

<div class="row border">
            <div class="col-md-10">
                <h2 id="Java">Expand your career opportunity in Java</h2>
                <br>
                <p>Java is a high-level programming language that is easy to learn and also supports object-oriented programming. We use a subset of all colors to create a smaller color palette for generating color schemes, also available as Sass variables and a Sass map in Bootstrap's scss/_variables.scss file.</p>

    
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
                            <img src="img/img1.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php endif; ?>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Course name -->
                        <h5 class="card-title">The Complete JAva Full Stack Development Course</h5>

                        <!-- Tutor name -->
                        <p class="card-text">Tutor: Surya</p>

                        <!-- Star rating -->
                        <div class="d-flex">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-secondary">&#9733;</span>
                        </div>
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div> 
<div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img6.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php endif; ?>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Course name -->
                        <h5 class="card-title">The Complete Java Full Stack Development Course</h5>

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
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>
<div class="col-md-3">
                <div class="card">
                    <!-- YouTube video embed -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($enrolled): ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K-4pZjy6M2U?si=Gyhd3A5FllS83YRs" allowfullscreen></iframe>
                        <?php else: ?>
                            <img src="img/img2.png" width='250' height='200' class="thumbnail embed-responsive-item" alt="Thumbnail">
                        <?php endif; ?>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Course name -->
                        <h5 class="card-title">The Complete Java Course</h5>

                        <!-- Tutor name -->
                        <p class="card-text">Tutor: Raja Krishnappa Veriaya</p>

                        <!-- Star rating -->
                        <div class="d-flex">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-secondary">&#9733;</span>
                        </div>
                        <form >
                    <input type="hidden" name="course_id" value="python_course_id"> <!-- Replace 'python_course_id' with the actual ID of the course -->
                    <button type="submit" class="btn btn-dark" name="enroll_btn">Enroll</button>
                </form>
                    </div>
</div>
</div>

            <!-- fetch from table -->
