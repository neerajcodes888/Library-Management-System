<?Php

session_start();
if(!isset($_SESSION['email']))
{
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
$pdf->Image('../images/pdf_logo.png', 0, -1, 90);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(40);
$pdf->Cell(90, 10, 'Admin Profile', 1, 1, 'C');
$pdf->Ln(3);

$adminList = getAdminData();
$pdf->Cell(20, 10, 'Name:', 0);
foreach ($adminList as $admin) {

    $pdf->Cell(20, 10, $admin['name'], 0);
}
$pdf->Ln();
$pdf->Cell(20, 10, 'Email:', 0);
foreach ($adminList as $admin) {


    $pdf->Cell(20, 10, $admin['email'], 0); // Genre

}
$pdf->Ln();
$pdf->Cell(20, 10, 'Phone:', 0);
foreach ($adminList as $admin) {

    $pdf->Cell(30, 10, $admin['mobile'], 0);

    $pdf->Ln(); 
}
$pdf->Ln(10);
$pdf->Cell(90, 10, 'Available Categories of Books', 1, 1, 'C');
$pdf->Ln(3);
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);

$availList = getAvailData();
$pdf->Cell(40, 10, 'Book Name', 1); 
$pdf->Cell(40, 10, 'Book Author.', 1); 
$pdf->Cell(20, 10, 'Book No.', 1); 
$pdf->Cell(30, 10, 'Student Name.', 1); 
$pdf->Cell(30, 10, 'Roll No.', 1); 
$pdf->Cell(35, 10, 'Issue Date.', 1); 
$pdf->Ln();

foreach ($availList as $avail) {

    $pdf->Cell(40, 10, $avail['book_name'], 1);
    $pdf->Cell(40, 10, $avail['book_author'], 1);
    $pdf->Cell(20, 10, $avail['book_no'], 1);
    $pdf->Cell(30, 10, $avail['name'], 1);
    $pdf->Cell(30, 10, $avail['id'], 1);
    $pdf->Cell(35, 10, $avail['Issued_date'], 1);
    $pdf->Ln();
}
$pdf->Output('books_list.pdf', 'I');
?>
