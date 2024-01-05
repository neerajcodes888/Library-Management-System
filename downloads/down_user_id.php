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
    $stmt = $conn->prepare("select * from users where id='$_SESSION[id]'");
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
$pdf->Cell(90, 10, 'Student Profile', 1, 1, 'C');
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
$pdf->Ln(1);
$pdf->Cell(30, 10, 'Email ID:', 0);
foreach ($userList as $user) {

    $pdf->Cell(30, 10, $user['email'], 0);

    $pdf->Ln(); 
}
$pdf->Ln(1);
$pdf->Cell(30, 10, 'Mobile No:', 0);
foreach ($userList as $user) {

    $pdf->Cell(30, 10, $user['mobile'], 0);

    $pdf->Ln(); 
}
$pdf->Ln(1);
$pdf->Cell(30, 10, 'Address:', 0);
foreach ($userList as $user) {

    $pdf->Cell(30, 10, $user['address'], 0);

    $pdf->Ln(); 
}
$pdf->Output('books_list.pdf', 'I');
?>