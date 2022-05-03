<?php 
	require_once("connectiondb.php");
	
	$a = $_GET['ID'];
	$b = isset($_POST['PROCEDURES'])?$_POST['PROCEDURES']:"";
	$i = isset($_POST['CALEND'])?$_POST['CALEND']:"";
	$c = isset($_POST['NOM'])?$_POST['NOM']:"";
	$d = isset($_POST['ETAT'])?$_POST['ETAT']:"";
	$sql = "UPDATE mobilites SET PROCEDURES='$b', CALENDRIER='$i', NOM='$c', ETAT='$d' WHERE ID = $a";
    $result = $connection->query($sql);
    $connection->close();
    header('location:partenaires.php');

?>