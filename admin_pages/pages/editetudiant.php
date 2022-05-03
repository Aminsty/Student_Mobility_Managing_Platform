<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edition d'un Etudiant</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php");
	require("connectiondb.php");
	$id="";
	if(isset($_GET['APOGEE'])) $id = $_GET['APOGEE'];

	$re="SELECT * FROM comptes WHERE APOGEE=$id";
	$res=$connection->query($re);
	$ligne=$res->fetch_assoc();
	$b=$ligne['CIN'];
	$c=$ligne['NOM'];
	$d=$ligne['PRENOM'];
	$e=$ligne['FILIERE'];
	$f=$ligne['EMAIL'];
	$g=$ligne['PASSWORD'];
    $connection->close(); ?>
	<div class="container">
	
	<div class="panel panel-primary margintop">
			<div class="panel-heading">Edition d'un Etudiant:</div>
				<div class="panel-body">
					<form method="post" action="editetudiantcode.php?APOGEE=<?php echo $id; ?>" class="form">
						<div class="form-group">
						<label for="CIN">CIN:</label>
						<input type="text" name="CIN" class="form-control" value="<?php echo $b;?>"/>
						</div>
						<div class="form-group">
						<label for="NOM">NOM:</label>
						<input type="text" name="NOM" class="form-control" value="<?php echo $c;?>"/>
						</div>
						<div class="form-group">
						<label for="PRENOM">PRENOM:</label>
						<input type="text" name="PRENOM" class="form-control" value="<?php echo $d; ?>"/>
						</div>
						<div class="form-group">
						<label for="FILIERE">FILIERE:</label>
						<input type="text" name="FILIERE" class="form-control" value="<?php echo $e; ?>"/>
						</div>
						<div class="form-group">
						<label for="EMAIL">EMAIL:</label>
						<input type="text" name="EMAIL" class="form-control" value="<?php echo $f; ?>"/>
						</div>
						<div class="form-group">
						<label for="PASSWORD">MOT DE PASSE:</label>
						<input type="password" name="PASSWORD" class="form-control" value="<?php echo $g; ?>"/>
						</div>
						<div class="form-group">
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Editer</button>
					</form>
				</div>
		</div>

	</div>
</body>
</html>