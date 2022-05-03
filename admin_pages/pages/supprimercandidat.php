<?php  
require_once("connectiondb.php");
$id="";
$idm="";
if(isset($_GET['APOGEE'])) $id = $_GET['APOGEE'];
if(isset($_GET['ID'])) $idm = $_GET['ID'];

$request = "DELETE FROM candidats WHERE APOGEE=$id AND IDmob = $idm";
$query = $connection->query($request);
header('location:candidats.php');

?>