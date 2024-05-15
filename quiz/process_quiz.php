<?php
// Start the session
session_start();

// Check if the score is passed in the URL
if(isset($_GET['score'])) {
    $total_score = $_GET['score'];
    // Assuming total questions are 20 (you can change this according to your actual number of questions)
    $total_questions = 10;
    // Calculate the percentage score
    $percentage_score = ($total_score / $total_questions) * 100;
} else {
    // Handle the case when score is not provided
    $percentage_score = null;
}

// Check if the percentage score is above 40%
if ($percentage_score !== null && $percentage_score > 40) {
    $message = "Congratulations! You are eligible for a certificate.";
} else {
    $message = "Sorry, you are not eligible for a certificate.";
}

// Retrieve the score from the URL
$score = isset($_GET['score']) ? $_GET['score'] : 0;

// Retrieve the cid from the URL
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';

// Now you can use $score and $cid as needed in your process_quiz.php page

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Process</title>
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
        <h2 class="text-center mb-4">Quiz Process</h2>
        <div class="text-center">
            <?php if ($percentage_score !== null): ?>
                <p>Your score: <?php echo $percentage_score; ?>%</p>
                
                <p><?php echo $message; ?></p>
                <?php if ($percentage_score > 40): ?>
                    <!-- Button to download certificate -->

                    <a href="index.php" class="btn btn-success">Download Certificate</a>

                <?php endif; ?>
            <?php else: ?>
                <p>Score not provided.</p>
            <?php endif; ?>
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
