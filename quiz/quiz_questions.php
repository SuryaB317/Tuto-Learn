<?php
// Start the session
session_start();

// Include database connection
include('../dbconnection.php');

// Retrieve course ID from the URL
if(isset($_GET['cid'])) {
    $cid = $_GET['cid'];
} else {
    // Redirect if course ID is not provided in the URL
    header("Location: tutor_view_course.php");
    exit();
}

// Retrieve quiz questions for the specified course ID
$query = "SELECT * FROM quiz_details WHERE cid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $cid);
$stmt->execute();
$result = $stmt->get_result();

// Fetch all rows and store them in an array
$quiz_questions = [];
while ($row = $result->fetch_assoc()) {
    $quiz_questions[] = $row;
}

// Count total questions
$total_questions = count($quiz_questions);

// Initialize variables for scoring
$correct_answers = 0;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answers'])) {
    // Retrieve submitted answers
    $submitted_answers = $_POST['answers'];

    // Loop through each submitted answer and compare with correct answers
    foreach ($quiz_questions as $row) {
        $question_number = $row['question_number'];
        if (isset($submitted_answers[$question_number]) && $submitted_answers[$question_number] == $row['correct_option']) {
            $correct_answers++;
        }
    }
    // Redirect to quiz completion page with the score
    header("Location: quiz_completion.php?score=$correct_answers");
    exit();
}

// Retrieve course title from the database based on the provided cid
$query = "SELECT course_title FROM course WHERE cid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $cid);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the course title
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $courseTitle = $row['course_title'];
} else {
    // Handle the case when no course title is found for the provided cid
    $courseTitle = "Course Title Not Found";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Quiz - <?php echo $courseTitle; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vk55o3udW7JW/nx6Ql25b56dCZBfBfL4FWi8R3+IorGzGM2W/tbrJn3LkMz0hz8R" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Test Your Skills with Quiz - <?php echo  $courseTitle; ?></h2>
        <hr>

        <?php if ($total_questions > 0): ?>
            <form method="post" action="">
                <?php foreach ($quiz_questions as $row): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Question <?php echo $row['question_number']; ?></h5>
                            <p class="card-text"><?php echo $row['question']; ?></p>
                            <div class="form-group">
                                <?php for ($i = 1; $i <= 4; $i++): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[<?php echo $row['question_number']; ?>]" id="option<?php echo $row['question_number'] . $i; ?>" value="<?php echo $i; ?>" required>
                                        <label class="form-check-label" for="option<?php echo $row['question_number'] . $i; ?>"><?php echo $row['option' . $i]; ?></label>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Submit Answers</button>
            </form>
        <?php else: ?>
            <p class="text-center">No quiz questions available for this course.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-t63HlE4hncd/YJajYwFWvKqPs47Da3cS/9aJR5EVk85Zz4Mz1iiOu1BkB1efb8dL" crossorigin="anonymous"></script>
</body>
</html>
