<?php 
	require_once("connectiondb.php");
	$a = isset($_POST['ID'])?$_POST['ID']:"";
	$c = isset($_POST['CALENDIER'])?$_POST['CALENDIER']:"";
	$d = isset($_POST['NOM'])?$_POST['NOM']:"";
	$b = isset($_POST['PROCEDURES'])?$_POST['PROCEDURES']:"";
	$e = isset($_POST['ETAT'])?$_POST['ETAT']:"";
	$re="INSERT INTO mobilites VALUES ($a, '$b', '$c', '$d', '$e')";
	
    $resultat=$connection->query($re);
    $connection->close();
    header('location:partenaires.php');

?>