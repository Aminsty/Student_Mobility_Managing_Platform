<?php
	if(!isset($_POST['email']) or empty($_POST['email']) or !isset($_POST['pass']) or empty($_POST['pass']))
	{
		header("Location:login.php?message=erreur");
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
			if($email==$ligne['EMAIL'] && md5($pass)==$ligne['PASSWORD'])
			{
				session_start();
				$_SESSION['authentif'] = true;
				$_SESSION['connected_user'] = $ligne;
				$nom = $ligne['NOM'];
				$prenom = $ligne['PRENOM'];
				$etd = ("$nom $prenom");
				$connection->close();
				header("Location:espace-etudiant.php");
				break;
			}
			/*if($email=="admin@usms.ac.ma" && $pass=="admin")
			{
				$connection->close();
				header("Location:espace-admin.php");
				break;
			}*/
		}
		if($ligne==false)
		{
			$connection->close();
			header("Location:login.php?message=infos_incorrects");
			$message=infos_incorrects;
		}
	}
?>