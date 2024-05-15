<?php
require('fpdf186/fpdf.php');

$pdf = new FPDF('L', 'mm', 'A4'); // 'L' for landscape orientation
$pdf->AddPage();

// Set border color and width
$pdf->SetDrawColor(0, 0, 0); // Black border
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
$content = "This is to certify that\n\n";
$content .= "_________________________________\n";
$content .= "(Student's Name)\n\n";
$content .= "has successfully completed the course\n\n";
$content .= "Introduction to PHP Programming\n\n";
$content .= "on this day, 19th February 2024.\n";
$pdf->MultiCell(0, 10, $content, 0, 'C');

// Output PDF
$pdf->Output('certificate.pdf', 'I');
?>
