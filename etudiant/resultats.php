<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../img/logo1.png"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/preinscriptions.css">
	<title>Espace étudiant</title>
	<script src="../js/bootstrap.min.js"></script>
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
						<li class="nav-item"><a class="nav-link" href="espace-etudiant.php"><b>Mobilitès</b></a></li>
						<li class="nav-item"><a class="nav-link" href="preinscriptions.php"><b>Mes préincriptions</b></a></li>
						<li class="nav-item"><a class="nav-link active" href="resultats.php"><b>Résultats</b></a></li>
						<li class="nav-item"><a class="nav-link" href="deconnecter.php"><img height="27px" src="../img/disc.png"><b> Se déconnecter</b></a></li>
					</ul>
				</div>
			</nav>
		</header>
		<main>
		<div class="top-page">
			<h1>Résultats</h1>

		</div>
		<div class="content-holder">
			<?php
			$connection = new mysqli("localhost", "root", "", "projet");
			$request = "SELECT * FROM resultats";
			$results = $connection->query($request);
			while($ligne = $results->fetch_assoc())
			{
				if($ligne['CIN'] == $cin)
				{
					echo "<table class=" . "'table table-hover'" .  ">";
					echo "<thead class=" . "'table-success data-sticky-header'" . "><tr><th scope=" . "col" . ">ID</th><th scope=" . "col" . ">Ecole</th><th scope=" . "col" . ">Nom</th><th scope=" . "col" . ">Prenom</th><th scope=" . "col" . ">Filiere</th><th scope=" . "col" . ">Etat</th></tr></thead>";
					echo "<tbody><tr><td scope=" . "'row'". ">" . $ligne['IDmob'] . "</td><td>" . $ligne['NOMmob'] . "</td><td>" . $ligne['NOM'] . "</td><td>" . $ligne['PRENOM'] . "</td><td>" . $ligne['FILIERE'] . "</td><td>" . $ligne['ETAT'] . "</td></tr>" ;
				}
			echo "</tbody></table>";
			}
			$connection->close();
			?>
		</div>
	<?php 
	}
	else 
		header("Location:login.php"); ?>
	</main>
</body>
</html>