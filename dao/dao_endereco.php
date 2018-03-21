<?php 

public class dao_endereco{

	include("../conexao.php");
	include("../bean/endereco.php");

	function create($endereco){
	    $sql = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "INSERT INTO endereco VALUES(
	        '".$endereco->endereco_id."',
	        '".$endereco->cep."',
	        '".$endereco->rua."',
	        '".$endereco->bairro."',
	        '".$endereco->cidade."')"
	
	        if($con->query($sql) === TRUE){
	
	        }else{
	
	        }
	    }
	    close_connection($con);
	}
	function read(){
	    $sql = "";
	    $result = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "SELECT * FROM endereco";
	        $result = $con->query($sql);
	
	        if($result->num_rows > 0){
	            return $result;
	        }else{
	            return null;
	        }
	    }
	    close_connection($con);
	}
	function delete($endereco){
	    $sql = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "DELETE FROM endereco WHERE endereco_id='".$endereco->endereco_id."'";
	
	        if($con->query($sql) === TRUE){
	
	        }else{
	
	        }
	    }
	    close_connection($con);
	}
	function update($endereco){
	    $sql = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "UPDATE endereco SET 
	        cep='".$endereco->cep."',
	        rua='".$endereco->rua."',
	        bairro='".$endereco->bairro."',
	        cidade='".$endereco->cidade."' WHERE 
	        endereco_id='".$endereco->endereco_id."'";
	
	        if($con->query($sql) === TRUE){
	
	        }else{
	            
	        }
	    }
	    close_connection($con);
	}
}
?>
