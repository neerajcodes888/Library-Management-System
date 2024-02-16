<?Php

session_start();
if(!isset($_SESSION['email']))
{
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

function getAdminData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select name,email,mobile from admins where email='$_SESSION[email]'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAvailData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select issued_books.book_name,issued_books.book_author,issued_books.book_no,date_format(issue_date,'%M %d %Y') as Issued_date,users.name ,users.id from issued_books left join users on issued_books.student_id = users.id");
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


$userList = getAdminData();
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(129,219,153); // Set background color
$pdf->Cell(0, 10, 'Your Profile', 1, 1, 'C', true); // Add 'true' parameter to fill the background
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Name: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['name'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Email ID: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['email'], 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Mobile NO: ', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, $userList[0]['mobile'], 1, 1, 'C');


$pdf->SetLineWidth(0.5);

// Draw a line
$pdf->Line(10, 10, 100, 10);
$pdf->Ln(10);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14); // Set font to bold and increase font size
$pdf->SetFillColor(200, 200, 200); // Set background color for title
$pdf->Cell(0, 10, 'Admin Issued Books', 1, 1, 'C', true); // Add 'true' parameter to fill the background
$pdf->SetFont('Arial', '', 12); // Reset font to regular
$pdf->Ln(3);
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);

$availList = getAvailData();
$pdf->SetFillColor(236, 229,14);
$pdf->Cell(50, 10, 'Book Name', 1,0,'C',true); 
$pdf->Cell(26, 10, 'Book Author', 1,0,'C',true); 
$pdf->Cell(20, 10, 'Book No.', 1,0,'C',true); 
$pdf->Cell(32, 10, 'Student Name', 1,0,'C',true); 
$pdf->Cell( 27, 10, 'Roll No.', 1,0,'C',true); 
$pdf->Cell(35, 10, 'Issue Date', 1,0,'C',true); 
$pdf->SetFillColor(236, 229,14);
$pdf->Ln();

foreach ($availList as $avail) {

    $pdf->Cell(50, 10, $avail['book_name'], 1);
    $pdf->Cell(26, 10, $avail['book_author'], 1);
    $pdf->Cell(20, 10, $avail['book_no'], 1);
    $pdf->Cell(32, 10, $avail['name'], 1);
    $pdf->Cell(27, 10, $avail['id'], 1);
    $pdf->Cell(35, 10, $avail['Issued_date'], 1);
    $pdf->Ln();
}
$pdf->Output('Issued Books List.pdf', 'I');
?>
