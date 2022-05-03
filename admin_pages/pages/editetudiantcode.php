<?php 
	require_once("connectiondb.php");
	
	$a = $_GET['APOGEE'];
	$b = isset($_POST['NOM'])?$_POST['NOM']:"";
	$i = isset($_POST['CIN'])?$_POST['CIN']:"";
	$c = isset($_POST['PRENOM'])?$_POST['PRENOM']:"";
	$d = isset($_POST['FILIERE'])?$_POST['FILIERE']:"";
	$e = isset($_POST['EMAIL'])?$_POST['EMAIL']:"";
	$f = isset($_POST['PASSWORD'])?$_POST['PASSWORD']:"";
	
	$sql = "UPDATE comptes SET NOM='$b', CIN='$i', PRENOM='$c', FILIERE='$d', EMAIL='$e', PASSWORD=md5('$f') WHERE APOGEE =$a";
    $query = $connection->query($sql);
    $connection->close();
	header('location:etudiants.php');

?>