<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../img/logo1.png"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/espace-etudiant.css">
	<title>Espace étudiant</title>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jsquery"></script>
</head>
<body>
	<?php
		session_start();
		if($_SESSION['authentif'] == true)
		{
			$user = $_SESSION['connected_user'];
			$cin = $user['CIN'];
	?>
		<header>
			<nav  class="navbar navbar-expand-md navbar-light nav-custom">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					  </button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<div class="navbar-header">
						<img src="../img/LOGO-ENSAK-800.png" height="55px"alt="logo">
					</div>
					<ul class="nav navbar-nav">
						<li class="nav-item"><a class="nav-link name-cont" style="pointer-events: none; color: #323D5B; font-family: sans-serif;border-right: solid black;" href="#"><b><?php echo "Bienvenue " . $user['NOM'] . " " . $user['PRENOM']; ?></b></a></li>
						<li class="nav-item"><a class="nav-link active" href="#"><b>Mobilitès</b></a></li>
						<li class="nav-item"><a class="nav-link" href="preinscriptions.php"><b>Mes préincriptions</b></a></li>
						<li class="nav-item"><a class="nav-link" href="resultats.php"><b>Résultats</b></a></li>
						<li class="nav-item"><a class="nav-link" href="deconnecter.php"><img height="27px" src="../img/disc.png"><b> Se déconnecter</b></a></li>
					</ul>
				</div>
			</nav>
		</header>
		<main>
		<div class="top-page">
			<h1>Mobilitès disponibles</h1>

		</div>
		<div class="content-holder">
			<?php
			$connection = new mysqli("localhost", "root", "", "projet");
			$request = "SELECT * FROM mobilites";
			$results = $connection->query($request);
			echo "<div><table class=" . "'table table-hover'" .  ">";
			echo "<thead class=" . "'table-success data-sticky-header'" . "><tr><th scope=" . "col" . ">ID</th><th scope=" . "col" . ">Nom</th><th scope=" . "col" . ">Procedures</th><th scope=" . "col" . ">Date de Fin</th><th scope=" . "col" . ">Candidater</th></tr></thead>";
			while($ligne = $results->fetch_assoc())
			{
				$i = $ligne['ID'];
					if($i == 1) $details_text = "Détails sur INSA Toulouse";
					if($i == 2) $details_text = "Détails sur INSA Centre Val De Loire";
					if($i == 3) $details_text = "Détails sur POLYTECH Angers";
					if($i == 4) $details_text = "Détails sur EIL Cote Opale";
					if($ligne['ETAT'] == 'ouvert'){
					echo "<tbody><tr><td scope=" . "'row'". ">" . $ligne['ID'] . "</td><td>" . $ligne['NOM'] . "<button onclick='toggleText($i)' id='buttonDetails-$i'><b>Plus de détails</b></button><span id='details-$i'><br/><br/>$details_text</span></td><td>" . $ligne['PROCEDURES'] . "</td><td>" . $ligne['CALENDRIER'] . "</td><td><a href=" . "candidater.php?id=$i" . ">Candidater</a></td></tr>";
				}
				else
					continue;
			}
			echo "</tbody></table></div>";
			$connection->close();
			?>
		</div>
		<h5><b>N.B : Refaire l'inscription pour une candidature où vous êtes déjà inscrits ne marchera pas, si vous voulez modifier les informations vous pouvez le faire dans la page 'Mes préinscriptions'</b></h5>
	<?php
		if(isset($_GET["message"]))
			$message = $_GET["message"];
		if(!empty($message) && $message == "succes_candid") {
							echo '<script language="javascript">';
							echo 'alert("Candidature faite avec succès")';
							echo '</script>';
		}
	}
	else 
		header("Location:login.php"); ?>
	</main>
</body>
<script src="../js/show-options.js"></script>
</html>