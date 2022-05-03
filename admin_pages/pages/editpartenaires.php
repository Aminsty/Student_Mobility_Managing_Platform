<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Partenaires</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php");
	require("connectiondb.php");
	$id="";
	if(isset($_GET['ID'])) $id = $_GET['ID'];

	$re="SELECT * FROM mobilites WHERE ID=$id";
	$res=$connection->query($re);
	$ligne=$res->fetch_assoc();
	$b=$ligne['ID'];
	$c=$ligne['PROCEDURES'];
	$d=$ligne['CALENDRIER'];
	$e=$ligne['NOM'];  
    $connection->close(); ?>
	<div class="container">
	
	<div class="panel panel-primary margintop">
			<div class="panel-heading">Edition d'une Partenaire:</div>
				<div class="panel-body">
					<form method="post" action="editpartenairescode.php?ID=<?php echo $id; ?>" class="form">
						<div class="form-group">
						<label for="PROCEDURES">PROCEDURES:</label>
						<input type="text" name="PROCEDURES" class="form-control" value="<?php echo $c?>"/>
						</div>
						<div class="form-group">
						<label for="CALENDIER">CALENDRIER:</label>
						<input type="date" name="CALEND" class="form-control" value="<?php echo $d ?>"/>
						</div>
						<div class="form-group">
						<label for="NOM">NOM:</label>
						<input type="text" name="NOM" class="form-control" value="<?php echo  $e?>"/>
						</div>
						<div class="form-group">
						<label for="NOM">ETAT:</label>
						<select type="text" name="ETAT" class="form-control">
							<option value="ouvert">Ouvert</option>
							<option value="ferme">Ferme</option>
						</select>
						</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Editer</button>
					</form>
				</div>
		</div>

	</div>
</body>
</html>