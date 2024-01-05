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

function getBookData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select books.book_name,books.book_no,book_price,authors.author_name from books left join authors on books.author_id = authors.author_id");
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
$pdf->Cell(90, 10, 'Available Books List', 1, 1, 'C');
$pdf->Ln(3);
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);

$bookList = getBookData();
$pdf->Cell(40, 10, 'Book Name', 1); 
$pdf->Cell(20, 10, 'Book No.', 1); 
$pdf->Cell(40, 10, 'Book Price', 1); 
$pdf->Cell(40, 10, 'Author Name', 1);
$pdf->Ln();

foreach ($bookList as $book) {

    $pdf->Cell(40, 10, $book['book_name'], 1);
    $pdf->Cell(20, 10, $book['book_no'], 1);
    $pdf->Cell(40, 10, $book['book_price'], 1);
    $pdf->Cell(40, 10, $book['author_name'], 1);
    $pdf->Ln();
}
$pdf->Output('books_list.pdf', 'I');
?>
