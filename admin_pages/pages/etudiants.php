<?php require_once("connectiondb.php");
	$name=isset($_GET['nameC'])?$_GET['nameC']:"";
	$selectc=isset($_GET['selectc'])?$_GET['selectc']:"all";

	$size = isset($_GET['size'])?$_GET['size']:6;
	$page = isset($_GET['page'])?$_GET['page']:1;
	$offset = ($page - 1) * $size;
	if($selectc=="all")
	{
		$re = "SELECT * FROM comptes LIMIT $size offset $offset";
		$recount = "SELECT count(*) countf FROM comptes";
	}else 
	{
		$re="SELECT * FROM comptes where $selectc LIKE '$name' LIMIT $size offset $offset";
		$recount = "SELECT count(*) countf FROM comptes where $selectc LIKE '$name'";
	}
	$res= $connection->query($re)  or die("errour");
	$resc= $connection->query($recount)  or die("errour");
	$tabcount = $resc->fetch_assoc();
	$nbr=$tabcount['countf'];
	if (($nbr % $size) == 0)
		$nbrpage = $nbr/$size;
	else
		$nbrpage = floor($nbr/$size) + 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion des étudiant</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">
		<div class="panel panel-success margintop">
			<div class="panel-heading">Rechercher les étudiant</div>
				<div class="panel-body">
					<form method="get" action="etudiants.php" class="form-inline">
						<div class="form-group">
						<input type="text" name="nameC" placeholder="Rechercher etudiant" class="form-control" value="<?php echo $name; ?>">
						</div>
						<label for="selectc">PAR:</label>
						<select name="selectc" class="form-control" id="selectc">
							<option value="all">Tous les options</option>
							<option value="APOGEE">APOGEE</option>
							<option value="CIN">CIN</option>
						</select>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>  Rechercher</button>
						&nbsp &nbsp
						<a href="nouvelleetudiant.php"><span class="glyphicon glyphicon-plus"></span> Nouvel etudiant</a>
					</form>
				</div>
		</div>
	
	<div class="panel panel-primary">
			<div class="panel-heading">Liste des étudiant <?php echo "($nbr etudiant)"; ?></div>
				<div class="panel-body">
					<table class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>APOGEE</th>
						<th>CIN</th>
						<th>NOM</th>
						<th>PRENOM</th>
					</tr>
					</thead>
					<tbody>
						<?php

						 while($ligne=$res->fetch_assoc()){ ?>
							<tr>
							<td><?php echo $ligne['APOGEE'] ?> </td>
							<td><?php echo $ligne['CIN'] ?> </td>
							<td><?php echo $ligne['NOM'] ?> </td>
							<td><?php echo $ligne['PRENOM'] ?> </td>
							<td>&nbsp<a href="editetudiant.php?APOGEE=<?php echo $ligne['APOGEE'] ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp<a onclick="return confirm('etes vous sur de vouloir supprimer un etudiant')" href="supprimeretudiant.php?APOGEE=<?php echo $ligne['APOGEE'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<div>
					<ul class="pagination pagination-md">
					<?php for($i=1;$i <= $nbrpage;$i++){ ?>
						<li class="<?php if($i==$page) echo 'active'; ?>"><a href="candidats.php?page=<?php echo $i; ?>"><?php echo "page $i"; ?></a></li>
					<?php } ?>
					</ul>
				</div>
				</div>
		</div>
	</div>
</body>
</html>