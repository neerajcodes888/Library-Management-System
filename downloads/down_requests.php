<?php

session_start();
if (!isset($_SESSION['email'])) {
die(include('../user/error.html'));
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
    $stmt = $conn->prepare("select name,id,course,department from users where id='$_SESSION[id]'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getBookData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select book_name,book_author,book_no,date_format(issue_date,'%d/%m /%Y') as Issued_date,date_format(adddate(issue_date,30),'%d/%m/%Y') as return_date  from issued_books where student_id='$_SESSION[id]'");
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




$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14); // Set font to bold and increase font size
$pdf->SetFillColor(200, 200, 200); // Set background color for title
$pdf->Cell(0, 10, 'Issued Books List', 1, 1, 'C', true); // Add 'true' parameter to fill the background
$pdf->SetFont('Arial', '', 12); // Reset font to regular
$pdf->Ln(3);

$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(3);
$bookList = getBookData();
$pdf->SetFillColor(236, 229,14); // Set background color for table header
$pdf->Cell(75, 10, 'Book Name', 1, 0, 'C', true); // Add 'true' to fill with background color
$pdf->Cell(40, 10, 'Book Author', 1, 0, 'C', true); // Add 'true' to fill with background color
$pdf->Cell(20, 10, 'Book No.', 1, 0, 'C', true); // Add 'true' to fill with background color
$pdf->Cell(30, 10, 'Issue Date', 1, 0, 'C', true); // Add 'true' to fill with background color
$pdf->Cell(25, 10, 'Return Date', 1, 1, 'C', true); // Add 'true' to fill with background color
$pdf->SetFont('Arial', '', 12); // Reset font
$pdf->SetFillColor(236, 229,14); // Reset background color for content
foreach ($bookList as $book) {
    $pdf->Cell(75, 10, $book['book_name'], 1);
    $pdf->Cell(40, 10, $book['book_author'], 1);
    $pdf->Cell(20, 10, $book['book_no'], 1);
    $pdf->Cell(30, 10, $book['Issued_date'], 1);
    $pdf->Cell(25, 10, $book['return_date'], 1);
    $pdf->Ln();
}

$pdf->Output('Issued books List.pdf', 'I');
?>
