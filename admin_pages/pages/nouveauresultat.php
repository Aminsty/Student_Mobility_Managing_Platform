<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion des filières</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">
	
	<div class="panel panel-primary margintop">
			<div class="panel-heading">Veuillez saisir les donnes de la nouvelle candidats</div>
				<div class="panel-body">
					<form method="post" action="insertresultat.php" class="form">
						<div class="form-group">
						<label for="APOGEE">APOGEE:</label>
						<input type="text" name="APOGEE" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="CIN">CIN:</label>
						<input type="text" name="CIN" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="NOM">NOM:</label>
						<input type="text" name="NOM" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="PRENOM">PRENOM:</label>
						<input type="text" name="PRENOM" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="FILIERE">FILIERE:</label>
						<input type="text" name="FILIERE" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="IDmob">IDmob:</label>
						<input type="text" name="IDmob" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="NOMmob">NOMmob:</label>
						<input type="text" name="NOMmob" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="ETAT">ETAT:</label>
						<select type="text" name="ETAT" class="form-control">
							<option value="accepte">Accepte</option>
							<option value="refuse">Refuse</option>
						</select>
						</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>  Enregister</button>
					</form>
				</div>
		</div>

	</div>
</body>
</html>