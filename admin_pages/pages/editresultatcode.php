<?php 
	require_once("connectiondb.php");
	
	$a = isset($_POST['APOGEE'])?$_POST['APOGEE']:"";
	$c = isset($_POST['ETAT'])?$_POST['ETAT']:"";
	
	$sql = "UPDATE resultats SET ETAT = '$c' WHERE APOGEE =$a";
    $query = $connection->query($sql);
    $connection->close();
	header('location:resultats.php');

?>