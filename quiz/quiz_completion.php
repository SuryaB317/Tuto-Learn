<?php
// Start the session
session_start();

// Check if the score is passed in the URL
if(isset($_GET['score'])) {
    $total_score = $_GET['score'];
} else {
    // Handle the case when score is not provided
    $total_score = "Score not provided";
}
// Retrieve the score from the URL
$score = isset($_GET['score']) ? $_GET['score'] : 0;

// Retrieve the cid from the URL
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';

// Now you can use $score and $cid as needed in your quiz_completion.php page


// Rest of your code to process the quiz completion and display results
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Completion</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

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
        <h2 class="text-center mb-4">Quiz Completed</h2>
        <div class="alert alert-success" role="alert">
            Congratulations! You have successfully completed the quiz.
        </div>
        <div class="text-center">
            <p>Your score: <?php echo $total_score; ?></p>
            <a href="process_quiz.php?score=<?php echo $total_score; ?>&cid=<?php echo $cid; ?>" class="btn btn-primary">Certificate</a>
       
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-5 md-5">
        &copy; 2024 Tuto-learn
    </footer>
    <!-- Bootstrap JS, jQuery, Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
