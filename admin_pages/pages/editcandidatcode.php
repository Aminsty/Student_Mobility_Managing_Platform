<?php 
	require_once("connectiondb.php");
	
	$a = isset($_POST['APOGEE'])?$_POST['APOGEE']:"0";
	$b = isset($_POST['NOM'])?$_POST['NOM']:"";
	$i = isset($_POST['CIN'])?$_POST['CIN']:"";
	$c = isset($_POST['PRENOM'])?$_POST['PRENOM']:"";
	$d = isset($_POST['EMAIL'])?$_POST['EMAIL']:"";
	$e = isset($_POST['IDmob'])?$_POST['IDmob']:"";
	$f = isset($_POST['NOMmob'])?$_POST['NOMmob']:"";
	
	$sql = "UPDATE candidats SET NOM='$b', PRENOM='$c', EMAIL='$d' WHERE APOGEE =$a";
    $query = $connection->query($sql);
	header('location:candidats.php');

?>