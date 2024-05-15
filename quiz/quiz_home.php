<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tuto_learn";
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the value of 'cid'
    if(isset($_GET['cid'])) {
        $courseId = $_GET['cid'];

        // Fetch the course details from the database
        $sql = "SELECT course_title FROM course WHERE cid='".$courseId."';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $courseTitle = $row['course_title'];
        } else {
            // Handle the case when no course is found with the provided ID
            $courseTitle = "Course Not Found";
        }
    } else {
        // Handle the case when 'cid' is not set
        $courseTitle = "Course ID is not set in the URL";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Template</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>
<style>
        .narrow-card {
            max-width: 500px; /* Adjust the max-width as needed */
            margin: 0 auto; /* Center the card horizontally */
        }
        .centered-button {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Tuto Learn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Add any additional navigation links here -->
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center mb-4"><?php echo $courseTitle; ?></h2>
        <div class="narrow-card">
            <div class="card">
                <div class="card-body md-3">
                    <h5 class="card-title"><b><u>Quiz Instructions</u></b></h5>
                    <p class="card-text">
                        <ul>Totally there are 20 questions.</ul>
                        <ul>All the questions are MCQ type.</ul>
                        <ul>There is No negative marks.</ul>
                        <ul>Don't refresh the page while attending the quiz.</ul>
                        <ul>At least 40% marks is mandatory.</ul>
                    </p>
                    <div class="centered-button">
    <a href="quiz_questions.php?cid=<?php echo urlencode($courseId); ?>" class="btn btn-primary">Start Quiz</a>
</div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2024 Tuto-Learn
    </footer>

    <!-- Bootstrap JS, jQuery, Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
