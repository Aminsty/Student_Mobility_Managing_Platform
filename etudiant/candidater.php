<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter un compte</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/candidature.css">
</head>
<body>
	<div class="top-container">
		<img src="../img/LOGO-ENSAK-800.png" height="138px">
		<h1>Formulaire de candidature</h1>
	</div>
	<?php
		session_start();
		if($_SESSION['authentif'] == true)
		{
			$i = $_GET["id"];
			$message="";
			if(isset($_GET["message"]))
				$message = $_GET["message"];
			$user = $_SESSION['connected_user'];
			$cin = $user['CIN'];
			if($i == 1) $nom = "INSA Toulouse";
			if($i == 2) $nom = "INSA Centre Val De Loire";
			if($i == 3) $nom = "POLYTECH Angers";
			if($i == 4) $nom = "EIL Cote Opale";
	?>
	<form action="traiter_candid.php" method="POST" enctype = "multipart/form-data">
		<table>
			<tr><td>ID :<td><input type="text" name="id" value="<?php echo $i; ?>" readonly></td></tr>
			<tr><td>CIN :<td><input type="text" name="cin" value="<?php echo $user['CIN']; ?>" readonly></td></tr>
			<tr><td>Code Apogée :<td><input type="text" name="apog" value="<?php echo $user['APOGEE']; ?>" readonly></td></tr>
			<tr><td>Nom :</td><td><input type="text" name="nom" value="<?php echo $user['NOM']; ?>"></td></tr>
			<tr><td>Prénom :<td><input type="text" name="prenom" value="<?php echo $user['PRENOM']; ?>"></td></tr>
			<tr><td>Filière :<td><select type="radio" name="filiere" >
				<option value="GI">GI</option>
				<option value="GE">GE</option>
				<option value="IID">IID</option>
				<option value="GRT">GRT</option>
				<option value="GPEE">GPEE</option></select>
			</td></tr>
			<tr><td>Email :<td><input type="text" name="email" value="<?php echo $user['EMAIL']; ?>"></td></tr>
			<tr><td>CV :<td><input type="file" name="cv"></td></tr>
			<tr><td>Lettre de motivation :<td><input type="file" name="lettre"></td></tr>
			<tr><td>Candidature à l'école :<td><input type="text" name="ecole" value="<?php echo $nom; ?>" readonly></td></tr>
		</table>
		<input type="submit" class="btn submit btn-primary mb-2" name="button" value="Envoyer" />
		<?php
		if(!empty($message) && $message == "erreur") {
		echo "<span style='color:red;font-weight:bold'>Un champs est vide</span>";
		}
		?>
	</form>
	<?php } 
	else 
		header("Location:login.php"); ?>
	<!--<script>
		function limiter(a){
	var submit =document.getElementById("sub-" + a);
	var b = <?php /*$_SESSION['candid'][$i];?>;
    console.log(<?php echo $_SESSION['candid'][$i];?>);
  
            if ( b == true) {

                alert("Candidature déja faite");


                location.replace("espace-etudiant.php");
            }
            else{
            	<?php $_SESSION['candid'][$i]= true;?> 
            	submit.setAttribute("type", "submit");

                console.log(<?php echo $_SESSION['candid'][$i];?>);
            }
}
	</script>
	onclick="limiter(<-?php echo $i; */?>)" id="sub-$i"-->
</body>
</html>
