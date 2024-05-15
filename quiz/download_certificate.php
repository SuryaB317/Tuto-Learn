<?php
require('fpdf186/fpdf.php');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tuto_learn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch username
$user_id = 'UA010'; // Assuming UA010 is the user_id
$username_query = "SELECT name FROM user WHERE uid = '$user_id'";
$result_username = $conn->query($username_query);
if ($result_username->num_rows > 0) {
    $row = $result_username->fetch_assoc();
    $username = $row["name"]; // Assuming the column for the username is 'name'
} else {
    $username = "Unknown";
}

// Fetch current date
$currentDate = date('jS F Y');

// Fetch course name
$course_id = 'CA101'; // Assuming CA101 is the course ID
$course_query = "SELECT course_title FROM course WHERE cid = '$course_id'";
$result_course = $conn->query($course_query);
if ($result_course->num_rows > 0) {
    $row = $result_course->fetch_assoc();
    $course_name = $row["course_title"]; // Assuming the column for the course title is 'course_title'
} else {
    $course_name = "Unknown Course";
}


// Create PDF
$pdf = new FPDF('L', 'mm', 'A4'); // 'L' for landscape orientation
$pdf->AddPage();

// Set border color and width
$pdf->SetDrawColor(0, 128, 0); // Green border
$pdf->SetLineWidth(5); // Border width

// Draw full border around the entire page
$pdf->Rect(5, 5, 287, 202); // Full page rectangle

// Certificate title
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(0, 20, 'Certificate of Completion', 0, 1, 'C');

// Add some space
$pdf->Ln(10);

// Certificate content
$pdf->SetFont('Arial', '', 14);

// Certificate text
$content = "This is to certify that\n\n";
$content .= "$username\n"; // Insert username dynamically
$content .= "has successfully completed the course\n\n";
$content .= "$course_name\n"; // Insert course name dynamically
$content .= "on this day, $currentDate.\n"; // Insert current date dynamically
$pdf->MultiCell(0, 10, $content, 0, 'C');

// Output PDF
$pdf->Output('certificate.pdf', 'I');

// Close connection
$conn->close();
?>
