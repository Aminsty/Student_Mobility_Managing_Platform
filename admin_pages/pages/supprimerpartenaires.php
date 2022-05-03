<?php  
require_once("connectiondb.php");
$id="";
if(isset($_GET['ID'])) $id = $_GET['ID'];

$request = "DELETE from mobilites WHERE ID='$id'";
$query = $connection->query($request);
header('location:partenaires.php');

?>