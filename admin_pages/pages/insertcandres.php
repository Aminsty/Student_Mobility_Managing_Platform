<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion des filières</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php"); 
	require("connectiondb.php");
	$id="";
	$apog="";
	if(isset($_GET['ID'])) $id = $_GET['ID'];
	if(isset($_GET['APOGEE'])) $apog = $_GET['APOGEE'];

	$re="SELECT * FROM candidats WHERE IDmob=$id AND APOGEE=$apog";
	$res=$connection->query($re);
	$ligne=$res->fetch_assoc();
	$a=$ligne['APOGEE'];
	$b=$ligne['CIN'];
	$c=$ligne['NOM'];
	$d=$ligne['PRENOM']; 
	$e=$ligne['FILIERE'];
	$f=$ligne['IDmob']; 
	$g=$ligne['NOMmob']; 
    $connection->close();?>
	<div class="container">
	<div class="panel panel-primary margintop">
			<div class="panel-heading">Inscription d'un résultat:</div>
				<div class="panel-body">
					<form method="post" action="insertrescandidatcode.php" class="form">
						<div class="form-group">
						<label for="CIN">APOGEE:</label>
						<input type="text" name="APOGEE" class="form-control" value="<?php echo $a;?>" readonly/>
						</div>
						<div class="form-group">
						<label for="CIN">CIN:</label>
						<input type="text" name="CIN" class="form-control" value="<?php echo $b;?>" readonly/>
						</div>
						<div class="form-group">
						<label for="NOM">NOM:</label>
						<input type="text" name="NOM" class="form-control" value="<?php echo $c;?>" readonly/>
						</div>
						<div class="form-group">
						<label for="PRENOM">PRENOM:</label>
						<input type="text" name="PRENOM" class="form-control" value="<?php echo $d; ?>" readonly/>
						</div>
						<div class="form-group">
						<label for="FILIERE">FILIERE:</label>
						<input type="text" name="FILIERE" class="form-control" value="<?php echo $e;?>" readonly/>
						</div>
						<div class="form-group">
						<label for="IDmob" value="<?php echo $f; ?>">IDmob:</label>
						<input type="text" name="IDmob" class="form-control" value="<?php echo $f; ?>" readonly/>
						</div>

						<div class="form-group">
						<label for="NOMmob">NOMmob:</label>
						<input type="text" name="NOMmob" class="form-control" value="<?php echo $g; ?>" readonly/>
						</div>
						<div class="form-group">
						<label for="ETAT">ETAT:</label>
						<select type="text" name="ETAT" class="form-control">
							<option value="accepte">Accepte</option>
							<option value="refuse">Refuse</option>
						</select>
						</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Ajouter</button>
					</form>
				</div>
		</div>

	</div>
</body>
</html>