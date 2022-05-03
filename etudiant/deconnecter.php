<?php
	session_start();
	//$_SESSION['authentif'] = false;
unset($_SESSION['authentif']);
	header('Location:login.php');
?>