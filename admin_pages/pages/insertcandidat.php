<?php 
	require_once("connectiondb.php");
	$a = isset($_POST['APOGEE'])?$_POST['APOGEE']:"";
	$b = isset($_POST['NOM'])?$_POST['NOM']:"";
	$i = isset($_POST['CIN'])?$_POST['CIN']:"";
	$c = isset($_POST['PRENOM'])?$_POST['PRENOM']:"";
	$d = isset($_POST['EMAIL'])?$_POST['EMAIL']:"";
	$e = isset($_POST['IDmob'])?$_POST['IDmob']:"";
	$f = isset($_POST['NOMmob'])?$_POST['NOMmob']:"";
	$g = isset($_POST['FILIERE'])?$_POST['FILIERE']:"";
	var_dump($i);
	$re="INSERT INTO candidats(APOGEE, CIN, NOM, PRENOM, FILIERE, EMAIL, IDmob, NOMmob) VALUES ($a, '$i', '$b', '$c', '$g', '$d', $e, '$f')";
	
    $resultat=$connection->query($re);
    $connection->close();
    header('location:candidats.php');

?>