<?php
require('fpdf186/fpdf.php');

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

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
$user_id = $_SESSION['user_id']; // Fetch user ID from session
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
if (!isset($_SESSION['course_id'])) {
    die("Course ID not set.");
}

$course_id = $_SESSION['course_id']; // Fetch course ID from session
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
$pdf->SetDrawColor(0, 0, 0); // Black border
$pdf->SetLineWidth(5); // Border width

// Add background image
$pdf->Image('certificate.jpeg', 0, 0, 297, 210); // Adjust the width and height as needed

// Certificate of achievement
$pdf->SetFont('Arial', 'BI', 36); // 'I' for italic
$pdf->SetTextColor(0, 0, 0); // Black color
$pdf->Cell(0, 20, 'Certificate of Completion', 0, 1, 'C');

// Add some space
$pdf->Ln(5);

// This certificate is presented to
$pdf->SetFont('Arial', 'BU', 18);
$pdf->SetTextColor(0, 0, 0); // Black color
$pdf->Cell(0, 20, 'THIS CERTIFICATE IS PRESENTED TO', 0, 1, 'C');

// Certificate content
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Black color

// Student's Name with underline
$pdf->Ln(10);
$pdf->Cell(0, 30, "SURYA", 0, 1, 'C'); // Dynamic username

// Course completion information
$pdf->MultiCell(0, 10, "Mr. SURYA has successfully completed the course,\nJAVA Full Crash Course, on $currentDate.", 0, 'C'); // Dynamic course name and current date

// Signature
$pdf->SetFont('Arial', 'BU', 15);
$pdf->Ln(50);
$pdf->Image('sign.jpg', $pdf->GetX() + 200, $pdf->GetY() - 10, 50); // Adjust the image path and position as needed
$pdf->SetX(0); // Reset X position to the left margin
$pdf->Cell(240, 15, 'Signature', 0, 1, 'R');

// Output PDF
$pdf->Output('certificate.pdf', 'I');

// Close connection
$conn->close();
?>
