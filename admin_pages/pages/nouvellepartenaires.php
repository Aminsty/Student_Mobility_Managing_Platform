<? php require("connectiondb.php");
		$re="select * from mobilites";
		$result = $pdo->query($re);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nouvelle Partenaires</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">
	
	<div class="panel panel-primary margintop">
			<div class="panel-heading">Veuillez saisir les donnes de la nouvelle candidats</div>
				<div class="panel-body">
					<form method="post" action="insertpartenaires.php" class="form">
						<div class="form-group">
						<label for="ID">ID:</label>
						<input type="text" name="ID" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="PROCEDURES">PROCEDURES:</label>
						<input type="text" name="PROCEDURES" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="CALENDIER">CALENDIER</label>
						<input type="date" name="CALENDIER" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="NOM">NOM:</label>
						<input type="text" name="NOM" class="form-control"/>
						</div>
						<div class="form-group">
						<label for="ETAT">ETAT:</label>
						<select type="text" name="ETAT" class="form-control">
							<option value="ouvert">Ouvert</option>
							<option value="ferme">Ferme</option>
						</select>
						</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>  Enregister</button>
					</form>
				</div>
		</div>

	</div>
</body>
</html>