<?php

function open_connection(){
	try {
		$con = new mysqli("localhost","root","root","oportunidadesbeta");
		mysqli_query($con,"SET NAMES 'utf8'");
		return $con;
	} catch (Exception $e){
		echo $e->getMessage();
		return null;
	}
}

function close_connection($con) {
	try{
		mysqli_close($con);
	}catch(Exception $e){
		echo $e->getMessage();
	}
}

?>
