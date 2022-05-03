<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion des partenaires</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">
		<div class="panel panel-success margintop">
			<div class="panel-heading">Ajouter le resultat d un etudiant</div>
				<div class="panel-body">
				<a href="nouveauresultat.php"><span class="glyphicon glyphicon-plus"></span> Nouveau resultat</a>
				</div>
		</div>
	
	<div class="panel panel-primary">
			<div class="panel-heading">Liste Resultats</div>
				<div class="panel-body">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>APOGEE</th>
						<th>CIN</th>
						<th>NOM</th>
						<th>PRENOM</th>
						<th>FILIERE</th>
						<th>IDmob</th>
						<th>NOMmob</th>
						<th>ETAT</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$connection = new mysqli("localhost", "root", "", "projet");
						$request = "SELECT * FROM resultats";
						$results = $connection->query($request);
						while($ligne = $results->fetch_assoc())
							{
								$a = $ligne['APOGEE'];
								echo "<tr><td scope=" . "'row'". ">" . $ligne['APOGEE'] . "</td><td>" . $ligne['CIN'] . "</td><td>" . $ligne['NOM'] . "</td><td>" . $ligne['PRENOM'] . "</td><td>" . $ligne['FILIERE'] . "</td><td>" . $ligne['IDmob'] . "</td><td>" . $ligne['NOMmob'] . "</td><td>" . $ligne['ETAT'] . "</td><td>&nbsp<a href=" . "editresultat.php?apog=$a" . ">Modifier</a></td></tr>" ;
								}
								$connection->close();
								?>
					</tbody>
				</table>
				</div>
		</div>

		<div class="panel panel-success">
		<div class="panel-heading">Télecharger les résultats d'une mobilité</div>
				<div class="panel-body">
					<button onclick="toggleText()" id="buttonDetails"><b>Mobilités</b></button><span style="display: none;" id="details"><br/><br/><form method="POST" action="resultats_pdf.php"><select type="text" name="ecole" class="form-control">
							<option value="1">INSA Toulouse</option>
							<option value="2">INSA Centre Val De Loire</option>
							<option value="3">POLYTECH Angers</option>
							<option value="4">EIL Cote Opale</option>
						</select><br/>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Télecharger</button></form></span>
				</div>
		</div>

	</div>
	<script type="text/javascript">
		function toggleText(a) {
  
            var details =document.getElementById("details");
  
            var buttonDetails =document.getElementById("buttonDetails");
  
            if (details.style.display == "none") {

                details.style.display = "inline";

                buttonDetails.innerHTML = "<b>Revenir</b>";
                
            }
            else {
               details.style.display = "none";
  
                buttonDetails.innerHTML = "<b>Mobilités</b>"; 
            }
        }
	</script>
</body>
</html>