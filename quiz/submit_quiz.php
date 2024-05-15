<?php
// Handle quiz submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_option = $_POST["answer"];
    // Process the selected option (e.g., check against the correct answer, save results, etc.)
    // Redirect the user to the quiz completion page or the next question
    header("Location: quiz_completion.php");
    exit();
}
?>
