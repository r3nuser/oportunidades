<?php
//include("conexao.php");
$host = "localhost";
$user = "root";
$password = "root";
$db = "oportunidades";


function open_connection(){
	try {
		$con = new mysqli($host,$user,$password,$db);
		return $con;
	} catch (Exception $e){
		echo $e->getMessage();
		return null;
	}
}

function close_connection($conn) {
	try{
		mysqli->close($con);
	}catch(Exception $e){
		echo $e->getMessage();
	}
}

?>
