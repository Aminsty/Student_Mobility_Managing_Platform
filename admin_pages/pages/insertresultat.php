<?php 
	require_once("connectiondb.php");
	$a = isset($_POST['APOGEE'])?$_POST['APOGEE']:"";
	$b = isset($_POST['NOM'])?$_POST['NOM']:"";
	$i = isset($_POST['CIN'])?$_POST['CIN']:"";
	$c = isset($_POST['PRENOM'])?$_POST['PRENOM']:"";
	$e = isset($_POST['IDmob'])?$_POST['IDmob']:"";
	$d = isset($_POST['NOMmob'])?$_POST['NOMmob']:"";
	$g = isset($_POST['FILIERE'])?$_POST['FILIERE']:"";
	$f = isset($_POST['ETAT'])?$_POST['ETAT']:"";
	$re="INSERT INTO resultats VALUES ($a, '$i', '$b', '$c', '$g', $e, '$d', '$f')";
	
    $resultat=$connection->query($re);
    $connection->close();
    header('location:resultats.php');

?>