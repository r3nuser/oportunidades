<?php

$host = "localhost";
$user = "root";
$password = "root";
$db = "oportunidades";


function open_database(){
	try {
		$con = new mysqli($host,$user,$password,$db);
		return $con;
	} catch (Exception $e){
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try{
		mysqli_close($con);
	}catch(Exception $e){
		echo $e->getMessage();
	}
}

?>
