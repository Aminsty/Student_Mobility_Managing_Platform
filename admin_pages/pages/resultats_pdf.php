<?php 

Class dbObj{
/* Database connection start */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "projet";
var $conn;
function getConnstring() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}

require_once("../libs/fpdf.php");


$id = $_POST['ecole']; 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/LOGO-ENSAK-800.png',10,-1,44);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Resultats Mobilite',1,0,'C');
    // Line break
    $this->Ln(25);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('APOGEE'=>'APOGEE', 'CIN'=> 'CIN', 'NOM'=> 'Nom','PRENOM'=> 'Prenom', 'FILIERE'=> 'Filiere', 'NOMmob'=> 'Ecole', 'ETAT'=> 'Etat');
 
$result = mysqli_query($connString, "SELECT APOGEE, CIN, NOM, PRENOM, FILIERE, NOMmob, ETAT FROM resultats WHERE IDmob = $id AND ETAT='accepte'");
$header = mysqli_query($connString, "SHOW columns FROM resultats");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',11);
foreach($header as $heading) {
    if($heading['Field']!= "IDmob"){
$pdf->Cell(29,11,$display_heading[$heading['Field']],1);
}
else
    continue;
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(29,11,$column,1);
}
$pdf->Output();
?>