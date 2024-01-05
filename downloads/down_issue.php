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
$pdf->Image('../images/pdf_logo.png', 0, -1, 90);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(40);
$pdf->Cell(90, 10, 'Your Profile', 1, 1, 'C');
$pdf->Ln(3);

$userList = getuserData();
$pdf->Cell(20, 10, 'Name:', 0);
foreach ($userList as $user) {

    $pdf->Cell(20, 10, $user['name'], 0);
}
$pdf->Ln();
$pdf->Cell(35, 10, 'Roll  Number:', 0);
foreach ($userList as $user) {

    $pdf->Cell(35, 10, $user['id'], 0); 

}
$pdf->Ln();
$pdf->Cell(20, 10, 'Course:', 0);
foreach ($userList as $user) {


    $pdf->Cell(20, 10, $user['course'], 0); // Genre


    $pdf->Ln(); 
}
$pdf->Ln(1);
$pdf->Cell(30, 10, 'Department:', 0);
foreach ($userList as $user) {

    $pdf->Cell(30, 10, $user['department'], 0);

    $pdf->Ln(); 
}

$pdf->Ln(10);
$pdf->Cell(90, 10, 'Issued Books List', 1, 1, 'C');
$pdf->Ln(3);
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);

$bookList = getBookData();
$pdf->Cell(40, 10, 'Book Name', 1); 
$pdf->Cell(40, 10, 'Book Author', 1); 
$pdf->Cell(20, 10, 'Book No.', 1); 
$pdf->Cell(40, 10, 'Issue Date', 1);
$pdf->Cell(40, 10, 'Return Date', 1); 
$pdf->Ln();
foreach ($bookList as $book) {
    $pdf->Cell(40, 10, $book['book_name'], 1);
    $pdf->Cell(40, 10, $book['book_author'], 1);
    $pdf->Cell(20, 10, $book['book_no'], 1);
    $pdf->Cell(40, 10, $book['Issued_date'], 1);
    $pdf->Cell(40, 10, $book['return_date'], 1);
    $pdf->Ln();
}
$pdf->Output('books_list.pdf', 'I');
?>