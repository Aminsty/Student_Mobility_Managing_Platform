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
	$apog="";
	if(isset($_GET['APOGEE'])) $apog = $_GET['APOGEE'];

	$re="SELECT * FROM Candidats WHERE APOGEE=$apog";
	$res=$connection->query($re);
	$ligne=$res->fetch_assoc();
	$a=$ligne['APOGEE'];
	$b=$ligne['CIN'];
	$c=$ligne['NOM'];
	$d=$ligne['PRENOM']; 
	$e=$ligne['EMAIL'];
	$f=$ligne['IDmob']; 
	$g=$ligne['NOMmob']; 
    $connection->close();?>
	<div class="container">
	<div class="panel panel-primary margintop">
			<div class="panel-heading">Edition d'une Candidats:</div>
				<div class="panel-body">
					<form method="post" action="editcandidatcode.php?APOGEE=<?php echo $a; ?>" class="form">
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
						<input type="text" name="NOM" class="form-control" value="<?php echo $c;?>"/>
						</div>
						<div class="form-group">
						<label for="PRENOM">PRENOM:</label>
						<input type="text" name="PRENOM" class="form-control" value="<?php echo $d; ?>"/>
						</div>
						<div class="form-group">
						<label for="EMAIL">EMAIL:</label>
						<input type="text" name="EMAIL" class="form-control" value="<?php echo  $e;?>"/>
						</div>
						<div class="form-group">
						<label for="IDmob" value="<?php echo $f; ?>">IDmob:</label>
						<input type="text" name="IDmob" class="form-control" value="<?php echo $f; ?>" readonly/>
						</div>

						<div class="form-group">
						<label for="NOMmob">NOMmob:</label>
						<input type="text" name="NOMmob" class="form-control" value="<?php echo $g; ?>" readonly/>
						</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Editer</button>
					</form>
				</div>
		</div>

	</div>
</body>
</html>