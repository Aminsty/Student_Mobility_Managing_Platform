<?php 
	require_once("connectiondb.php");
	$a = isset($_POST['APOGEE'])?$_POST['APOGEE']:"";
	$b = isset($_POST['NOM'])?$_POST['NOM']:"";
	$i = isset($_POST['CIN'])?$_POST['CIN']:"";
	$c = isset($_POST['PRENOM'])?$_POST['PRENOM']:"";
	$d = isset($_POST['FILIERE'])?$_POST['FILIERE']:"";
	$e = isset($_POST['EMAIL'])?$_POST['EMAIL']:"";
	$f = isset($_POST['PASSWORD'])?$_POST['PASSWORD']:"";

	$re="INSERT INTO comptes VALUES ($a, '$i', '$b', '$c', '$d', '$e', md5('$f'))";
	
    $resultat=$connection->query($re);
    $connection->close();
    header('location:etudiants.php');

?>