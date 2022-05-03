<?php 
session_start();
		if($_SESSION['authentif'] == true)
		{
?>
<nav  class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="candidats.php" class="navbar-brand">Gestion de mobilité</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="candidats.php">Les candidats</a></li>
			<li><a href="partenaires.php">Les partenaires</a></li>
			<li><a href="etudiants.php">Les étudiants</a></li>
			<li><a href="resultats.php">Les resultats</a></li>
			<li><a href="tableau.php">Tableau de bord</a></li>
			<li><a href="deconnecter-admin.php">Se deconnecter</a></li>
		</ul>
	</div>
</nav>
<?php }
else
	header("Location:../login-admin.php");
?>