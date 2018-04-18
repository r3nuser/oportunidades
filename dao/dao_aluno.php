<?php 
	
	include("C:/Xampp/htdocs/oportunidades/conexao.php");
	include("C:/Xampp/htdocs/oportunidades/bean/aluno.php");
	
 class dao_aluno{

	

	function create($aluno){
	    $sql = "";
	    $con = open_connection();
	    
	    if($con != null){
	        $sql = "INSERT INTO aluno VALUES (
	        '".$aluno->aluno_cpf."',
	        '".$aluno->nome."',
	        '".$aluno->email."',
	        '".$aluno->fk_endereco_id."',
	        '".$aluno->trabalhando."',
	        '".$aluno->expec_sobre_curso."',
			'".$aluno->como_conheceu."')";
	
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
	        $sql = "SELECT * FROM aluno";
	        $result = $con->query($sql);
	
	        if($result->num_rows > 0){
	            return $result;
	        }else{
	            return null;
	        }
	    }
	    close_connection($con);
	}
	function delete($aluno){
	    $sql = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "DELETE FROM aluno WHERE aluno_cpf='".$aluno->aluno_cpf."'";
	
	        if($con->query($sql) === TRUE){
	
	        }else{
	            
	        }
	    }
	    close_connection($con);
	}
	function update($aluno){
	    $con = open_connection();
	    if($con != null){
	        $sql = "UPDATE aluno SET 
	        nome='".$aluno->nome."',
	        telefone='".$aluno->telefone."',
	        email='".$aluno->email."',
	        fk_endereco_id='".$aluno->fk_endereco_id."' 
	        where aluno_cpf='".$aluno->aluno_cpf."'";
	
	        if($con->query($sql)===TRUE){
	
	        }else{
	
	        }
	    }
	    close_connection($con);
	}
}
?>
