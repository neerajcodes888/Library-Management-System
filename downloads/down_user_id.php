<?php

session_start();
if (!isset($_SESSION['email'])) {
    die("Access denied");
}
require('../pdf/fpdf.php');

function connectDB()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'lms';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function getuserData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select * from users where id='$_SESSION[id]'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$pdf = new FPDF();
$pdf->AddPage();
// $pdf->Image('../images/pdf_logo.png', 0, -1, 90);
// $pdf->Ln(5);
// Set line width
$pdf->SetLineWidth(0.5);

// Draw a line
$pdf->Line(10, 10, 100, 10);
$pdf->SetFont('Arial', 'B', 13);
$pdf->SetFillColor(4, 216, 209); // Set background color
$pdf->Cell(0, 10, 'Library Management System', 1, 1, 'C', true); // Add 'true' parameter to fill the background
$pdf->Ln(3);


$userList = getuserData();
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(129,219,153); // Set background color
$pdf->Cell(0, 10, 'Your Profile', 1, 1, 'C', true); // Add 'true' parameter to fill the background
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Name: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['name'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Roll Number: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['id'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Course: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['course'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Department: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['department'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Email ID: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['email'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Mobile NO: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['mobile'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Address: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['address'], 1, 1, 'C');

$pdf->SetLineWidth(0.5);

// Draw a line
$pdf->Line(10, 10, 100, 10);
$pdf->Ln(10);
// $pdf->SetFont('Arial', 'I', 10);
// $pdf->Cell(20);
// $pdf->Cell(0, 10, 'Come', 0, 1, 'L'); // Instruction for name
// $pdf->Cell(20);
// $pdf->Cell(0, 10, 'Go', 0, 1, 'L'); 


$pdf->Output('ID_Card.pdf', 'I');
?>
