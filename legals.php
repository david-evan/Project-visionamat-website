<?php
include('includes/config.php');
$PageName = 'legals';

/* Si l'utilisateur à besoin de la page en Français sur le site Anglais */
if(isset($_GET['lang']))
	$Template = new Template($PageName, 0, true);
else
	$Template = new Template($PageName);
?>