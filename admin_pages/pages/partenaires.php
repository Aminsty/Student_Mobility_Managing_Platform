<?php require_once("connectiondb.php");
	$name=isset($_GET['nameC'])?$_GET['nameC']:"";
	$selectc=isset($_GET['selectc'])?$_GET['selectc']:"all";

	$size = isset($_GET['size'])?$_GET['size']:6;
	$page = isset($_GET['page'])?$_GET['page']:1;
	$offset = ($page - 1) * $size;
	if($selectc=="all")
	{
		$re = "select * from mobilites limit $size offset $offset";
		$recount = "select count(*) countf from candidats";
	}else 
	{
		$re="select * from mobilites where $selectc like '$name' limit $size offset $offset";
		$recount = "select count(*) countf from mobilites where $selectc like '$name'";
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
	<title>Liste des partenaires</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
	<?php include("menu.php"); ?>
	<div class="container">
		<div class="panel panel-success margintop">
			<div class="panel-heading">Rechercher les partenaires</div>
				<div class="panel-body">
				<!--<form method="get" action="partenaires.php" class="form-inline">
						<div class="form-group">
						<input type="text" name="nameC" placeholder="Rechercher partenaires" class="form-control">
						</div>
						<label for="selectc">PAR:</label>
						<select name="selectc" class="form-control" id="selectc">
							<option value="all">Tous les options</option>
							<option value="NOMmob">NOMmob</option>
							<option value="IDmob">IDmob</option>
						</select>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>  Rechercher</button>
						&nbsp &nbsp-->
						<a href="nouvellepartenaires.php"><span class="glyphicon glyphicon-plus"></span> Nouveau partenaire</a>
					</form>
				</div>
		</div>
	<div class="panel panel-primary">
			<div class="panel-heading">Liste de mobilitée <?php echo "($nbr mobilites)"; ?></div>
				<div class="panel-body">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>ID Mobilité</th>
						<th>Nom de l'école</th>
						<th>Procédures</th>
						<th>Calendrier</th>
						<th>Etat</th>
					</tr>
					</thead>
					<tbody>
						<?php
						//$connection = new mysqli("localhost:3308", "root", "", "projet");
						//$request = "SELECT * FROM mobilites";
						//$results = $connection->query($request);
						 while($ligne= $res -> fetch_assoc()){ ?>
							<tr>
							<td><?php echo $ligne['ID'];?></td>
							<td><?php echo $ligne['NOM'];?></td>
							<td><?php echo $ligne['PROCEDURES'];?></td>
							<td><?php echo $ligne['CALENDRIER'];?></td>
							<td><?php echo $ligne['ETAT'];?></td>
							<td>&nbsp<a href="editpartenaires.php?ID=<?php echo $ligne['ID']; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp<a onclick="return confirm('etes vous sur de vouloir supprimer un partenaire')" href="supprimerpartenaires.php?ID=<?php echo $ligne['ID']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
					<?php } $connection->close();?>
					</tbody>
				</table>
				<div>
					<ul class="pagination pagination-md">
					<?php for($i=1;$i <= $nbrpage;$i++){ ?>
						<li class="<?php if($i==$page) echo 'active'; ?>"><a href="partenaires.php?page=<?php echo $i; ?>"><?php echo "page $i"; ?></a></li>
					<?php } ?>
					</ul>
				</div>
	
				</div>
		</div>

	</div>
</body>
</html>