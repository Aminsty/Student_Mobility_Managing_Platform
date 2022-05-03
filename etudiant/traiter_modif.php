<?php
	session_start();
		if($_SESSION['authentif'] == true)
		{
				$id = $_POST['id'];
			if(!isset($_POST['nom']) or empty($_POST['nom']) or !isset($_POST['prenom']) or empty($_POST['prenom']))
			{
				header("Location:modifier_candid.php?id=$id&message=erreur");
				$message=erreur;
			}
			else{
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$cin = $_POST['cin'];
				$apog = $_POST['apog'];
				$filiere = $_POST['filiere'];
				$email = $_POST['email'];
				$nom_ecole = $_POST['ecole'];
				$upload_dir = "C:/wamp64/www/Projet/admin";
				move_uploaded_file($_FILES['cv']['tmp_name'] , "$upload_dir/CV/" . $nom . ".pdf");
				move_uploaded_file($_FILES['lettre']['tmp_name'] , "$upload_dir/Lettre/". $nom . ".pdf");
				$connection = new mysqli("localhost", "root", "", "Projet");
				$request = "UPDATE candidats SET NOM = '$nom', PRENOM = '$prenom', FILIERE = '$filiere', EMAIL = '$email' WHERE APOGEE = $apog AND IDmob = $id";
				$results = $connection->query($request);
				$connection->close();
				header("Location:espace-etudiant.php?message=succes_candid");
				$message=succes_candid;
				}
		}
		else
			header("Location:login.php");
?>