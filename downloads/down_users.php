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
function getuserData()
{
    $conn = connectDB();
    $stmt = $conn->prepare("select * from users");
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


    $pdf->Ln(); // Move to the next line
}
$pdf->Ln(1);
$pdf->Cell(20, 10, 'Phone:', 0);
foreach ($adminList as $admin) {

    $pdf->Cell(30, 10, $admin['mobile'], 0);

    $pdf->Ln(); 
}

$pdf->Ln(10);
$pdf->Cell(90, 10, 'Registered Users', 1, 1, 'C');
$pdf->Ln(3);
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);

$userList = getuserData();
$pdf->Cell(30, 10, 'Roll', 1); 
$pdf->Cell(30, 10, 'Name', 1); 
$pdf->Cell(15, 10, 'Course', 1);
$pdf->Cell(30, 10, 'Department', 1); 
$pdf->Cell(60, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Mobile', 1);
$pdf->Ln();

foreach ($userList as $user) {
 
    $pdf->Cell(30, 10, $user['id'], 1);
    $pdf->Cell(30, 10, $user['name'], 1);
    $pdf->Cell(15, 10, $user['course'], 1);
    $pdf->Cell(30, 10, $user['department'], 1);
    $pdf->Cell(60, 10, $user['email'], 1);
    $pdf->Cell(30, 10, $user['mobile'], 1);
    $pdf->Ln();
}
$pdf->Output('books_list.pdf', 'I');
?>
