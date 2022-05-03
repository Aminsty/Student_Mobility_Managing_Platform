<?php
	if(!isset($_POST['email']) or empty($_POST['email']) or !isset($_POST['pass']) or empty($_POST['pass']))
	{
		header("Location:login-admin.php?message=erreur");
		$message=erreur;
	}
	else{
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$connection = new mysqli("localhost", "root", "", "Projet");
		$request = "SELECT * FROM comptes";
		$results = $connection->query($request);
		while($ligne = $results->fetch_assoc())
		{
			if(md5($pass)==md5("admin") && $email == "admin@usms.ac.ma")
			{
				session_start();
				$_SESSION['authentif'] = true;
				$connection->close();
				header("Location:pages/candidats.php");
				break;
			}
		}
		if($ligne==false)
		{
			$nom = $ligne['NOM'];
			$prenom = $ligne['PRENOM'];
			$etd = ("$nom $prenom");
			$connection->close();
			header("Location:login-admin.php?message=infos_incorrects");
			$message=infos_incorrects;
		}
	}
?>