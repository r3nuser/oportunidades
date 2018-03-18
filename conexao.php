<?php


$host = "localhost";
$user = "root";
$password = "root";
$db = "oportunidades";

$mysqli = new mysqli($host,$user,$password,$db);

if($mysqli->connect_error)
	echo "Falha na conexão(".$mysqli->connect_error.")";

?>
