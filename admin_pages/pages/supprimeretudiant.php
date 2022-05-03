<?php  
require_once("connectiondb.php");
$id="";
if(isset($_GET['APOGEE'])) $id = $_GET['APOGEE'];

$request = "DELETE from etudiant WHERE APOGEE='$id'";
$query = $connection->query($request);
header('location:etudiants.php');

?>