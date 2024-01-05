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
function getDuesData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select issued_books.book_name,issued_books.book_author,issued_books.book_no,issued_books.s_no,issued_books.dues_status,datediff(current_date,adddate(issued_books.issue_date,30)) as dues from issued_books left join users on issued_books.student_id = users.id where current_date > adddate(issued_books.issue_date,30) and student_id = '$_SESSION[id]'");
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
$pdf->setFillColor(230,230,230); 
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


    $pdf->Ln(); // Move to the next line
}
$pdf->Ln(1);
$pdf->Cell(30, 10, 'Department:', 0);
foreach ($userList as $user) {

    $pdf->Cell(30, 10, $user['department'], 0);

    $pdf->Ln(); 
}

$pdf->Ln(10);
$pdf->Cell(90, 10, 'Dues Books List', 1, 1, 'C');
$pdf->Ln(3);
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);

$bookList = getDuesData();
$pdf->Cell(10, 10, 'ID.', 1); 
$pdf->Cell(30, 10, 'Book No.', 1); 
$pdf->Cell(40, 10, 'Book Name', 1);
$pdf->Cell(30, 10, 'Book Price', 1); 
$pdf->Cell(40, 10, 'Author Name', 1);
$pdf->Cell(20, 10, 'Dues', 1);
$pdf->Cell(20, 10, 'Status', 1);
$pdf->Ln();

foreach ($bookList as $book) {
 
    $pdf->Cell(10, 10, $book['s_no'], 1);
    $pdf->Cell(30, 10, $book['book_no'], 1);
    $pdf->Cell(40, 10, $book['book_name'], 1);
    $pdf->Cell(30, 10, $book['book_price'], 1);
    $pdf->Cell(40, 10, $book['author_name'], 1);
    $pdf->Cell(20, 10, $book['dues'], 1);
    $pdf->Cell(20, 10, $book['dues_status'], 1);
    $pdf->Ln();
}
$pdf->Output('books_list.pdf', 'I');
?>